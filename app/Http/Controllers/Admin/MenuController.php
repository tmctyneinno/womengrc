<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\ProjectMenu;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\DropdownItem; 
use Illuminate\Support\Str;
use App\Http\Traits\AdminTrait;
 
class MenuController extends Controller
{
    use AdminTrait;
    public function creatMenu(){
        return view('admin.menu.create');
    }

    public function indexMenu(){
        $menuItems = MenuItem::with('dropdownItems')->get();
        return view('admin.menu.index', compact('menuItems'));
    }

    public function storeMenu(Request $request){
        $this->validateMenu($request); 
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:menu_items,name',
            'items' => 'nullable|array',
            'items.*.name' => 'required_with:items|string|max:255', 
            'items.*.sub_items' => 'nullable|array', 
            'items.*.sub_items.*' => 'required_with:items.*.sub_items|string|max:255',
        ]);
        $menuItem = MenuItem::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);
        // 3. Process nested items if present
        if (!empty($validated['items'])) {
            foreach ($validated['items'] as $itemData) {
                if (!empty($itemData['name'])) {
                    $dropdownItem = DropdownItem::create([
                        'menu_item_id' => $menuItem->id,
                        'parent_id' => null,
                        'name' => $itemData['name'],
                        'slug' => Str::slug($itemData['name']), 
                    ]);

                    if (!empty($itemData['sub_items'])) {
                        foreach ($itemData['sub_items'] as $subItemName) {
                            if (!empty($subItemName)) {
                                DropdownItem::create([
                                    'menu_item_id' => $menuItem->id, 
                                    'parent_id' => $dropdownItem->id, 
                                    'name' => $subItemName,
                                    'slug' => Str::slug($subItemName),
                                ]);
                            }
                        }
                    }
                }
            }
        }
        
        return redirect()->route('admin.menu.create')->with('success', 'Menu item created successfully!');
    }

    public function editMenu($id)
    {
        $menuItem = MenuItem::with('dropdownItems.children')->findOrFail(decrypt($id));
        
        return view('admin.menu.edit', compact('menuItem'));
    }

    public function updateMenu(Request $request, $id)
    {
        $menuItem = MenuItem::findOrFail(decrypt($id)); 

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:menu_items,name,' . $menuItem->id,
            'items' => 'nullable|array',
            'items.*.name' => 'required_with:items|string|max:255',
            'items.*.sub_items' => 'nullable|array',
            'items.*.sub_items.*' => 'required_with:items.*.sub_items|string|max:255',
        ]);

        $menuItem->update([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        $existingDropdownIds = $menuItem->dropdownItems()->pluck('id');
        if ($existingDropdownIds->isNotEmpty()) {
            DropdownItem::whereIn('id', $existingDropdownIds)->delete();
        }
       
        if (!empty($validated['items'])) {
             foreach ($validated['items'] as $itemData) {
                if (!empty($itemData['name'])) {
                    $dropdownItem = DropdownItem::create([
                        'menu_item_id' => $menuItem->id,
                        'parent_id' => null,
                        'name' => $itemData['name'],
                        'slug' => Str::slug($itemData['name']),
                    ]);

                    // Process sub-items
                    if (!empty($itemData['sub_items'])) {
                        foreach ($itemData['sub_items'] as $subItemName) {
                            if (!empty($subItemName)) {
                                DropdownItem::create([
                                    'menu_item_id' => $menuItem->id,
                                    'parent_id' => $dropdownItem->id,
                                    'name' => $subItemName,
                                    'slug' => Str::slug($subItemName),
                                ]);
                            }
                        }
                    }
                }
            }
        }

        return redirect()->route('admin.menu.edit', encrypt($menuItem->id))->with('success', 'Menu item and structure updated successfully!');
    }
    
    
    public function destroyMenu($id)
    {
        $menuItem = MenuItem::findOrFail(decrypt($id));

        $menuItem->delete();

        return redirect()->route('admin.menu.index')->with('success', 'Menu item and all its dropdowns deleted successfully!');
    }

    public function projectMenu(){
        return view('admin.projects.projectMenu');
    } 

    public function storeProjectMenu(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:5048', 
        ]);
    
        $imageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('projectType'), $imageName);
    
        ProjectMenu::create([
            'name' => $request->name,
            'image' => 'projectType/'.$imageName,
        ]);
    
        return back()->with('addProjectMenu', 'Your Project Menu has been added.');
    }
    

    public function editProjectMenu($id){
        $decrypted = decrypt($id);
        $projectMenu = ProjectMenu::findOrFail($decrypted);
        return view('admin.projects.projectMenuEdit', compact('projectMenu'));
    }

   

    public function updateProjectMenu(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        // Find the existing project menu by its ID
        $existingMenu = ProjectMenu::find($id);

        if (!$existingMenu) {
            return back()->with('error', 'Project Menu not found.');
        }

        // Prepare the data for updating the record
        $updateData = ['name' => $request->name]; // Update the name

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // If an existing image is present, delete it
            if ($existingMenu->image) {
                $imagePath = public_path($existingMenu->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath); // Delete old image
                }
            }

            // Upload the new image
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('projectType'), $imageName);
            $updateData['image'] = 'projectType/' . $imageName; // Add image path to the update data
        }

        // Update the existing record with the new data
        $existingMenu->update($updateData);

        return back()->with('success', 'Project Menu updated successfully.');
    }

    



    public function destroyProjectMenu($id)
    {
       
        $projectMenu = ProjectMenu::findOrFail(decrypt($id));
        $projectMenu->delete();

        return redirect()->route('admin.project.projectMenu')->with('success', 'Project Menu deleted successfully.');
    }

}
