<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\ProjectMenu;
use Illuminate\Http\Request;
use App\Models\MenuItem;
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
        $name = $request->name; 
        $slug = Str::slug($request->name);
        $menuItem = new MenuItem();
        $menuItem->name = $name ;
        $menuItem->slug =  $slug;
        $menuItem->save();


        $menuItem['slug'] = Str::slug($request->name);
        if ($request->has('dropdown_items')) {
            $this->createDropdownItems($menuItem, $request->dropdown_items);
        }
        return redirect()->route('admin.menu.create')->with('success', 'Menu item created successfully!');
    }

    public function editMenu($id)
    {
        $menuItem = MenuItem::findOrFail(decrypt($id));
        return view('admin.menu.edit', compact('menuItem'));
    }

    public function updateMenu(Request $request, $id)
    {
        $this->validateMenu($request);

        $menuItem = MenuItem::findOrFail($id);
        // Update the URL only if 'name' is provided
        if ($request->has('name')) {
            $menuItem->name = $request->name;
            $menuItem->slug = Str::slug($request->name);
        }
        $menuItem->save();
        
        $menuItem->dropdownItems()->delete();
        if ($request->has('dropdown_items')) {
            $this->createDropdownItems($menuItem, $request->dropdown_items);
        } 
        return redirect()->back()->with('success', 'Menu item updated successfully!');
    }
    
    
    public function destroyMenu($id)
    {
        $menuItem = MenuItem::findOrFail(decrypt($id));
        $menuItem->dropdownItems()->delete();
        $menuItem->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu item deleted successfully!');
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
