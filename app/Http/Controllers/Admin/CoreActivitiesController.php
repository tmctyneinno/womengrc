<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\CoreActivities;


use Illuminate\Http\Request;

class CoreActivitiesController extends Controller
{
    public function index(){
       
        return view('admin.coreActivities.index');
    }

    public function create(){
        return view('admin.coreActivities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,svg,jpg,gif|max:5048',
        ]);
 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid()  . '.' . $image->extension();
            $image->move(public_path('assets/images/coreActivities'), $imageName);
        }
        
        CoreActivities::create(array_merge($validated, ['image' => 'assets/images/coreActivities/'.$imageName]));
    
        return redirect()->route('admin.coreActivities.create')->with('success', 'Core Activities created successfully.');
    }

    public function edit($id)
    {
        $coreActivities = CoreActivities::findOrFail(decrypt($id));
        return view('admin.coreActivities.edit', compact('coreActivities'));
    } 
 
    public function update(Request $request, $id)
    {
        try{
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,svg,gif|max:32768',
        ]);

        $coreActivities = CoreActivities::findOrFail($id);
        
        if ($request->hasFile('image')) {
            if ($coreActivities->image && file_exists(public_path($coreActivities->image))) {
                unlink(public_path($coreActivities->image));
            }

            $image = $request->file('image');
            $imageName = uniqid() . '.' . $image->extension();
            $image->move(public_path('assets/images/coreActivities'), $imageName);
            $coreActivities->image = 'assets/images/coreActivities/' . $imageName;
        }

        $coreActivities->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $coreActivities->image, 
        ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add core value statement. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.'.$e->getMessage());
        }

        return redirect()->route('admin.coreActivities.index')->with('success', 'Core Activities updated successfully.');
    }

    public function destroy($id)
    {
        $coreActivities= CoreActivities::findOrFail(decrypt($id));
        $coreActivities->delete();
        return redirect()->route('admin.coreActivities.index')->with('success', 'Core Activities deleted successfully.');
    }

    public function show($slug)
    {
        $coreActivitiesItem = CoreActivities::where('slug', $slug)->first();

        if (!$coreActivitiesItem) {
            return view('home.errors.404'); 
        }

        $relatedCoreActivities = CoreActivities::where('id', '!=', $coreActivitiesItem->id)
                                     ->inRandomOrder()
                                     ->take(6) 
                                     ->get();

        return view('home.pages.coreActivities.coreActivities-details', compact('coreActivitiesItem', 'relatedCoreActivities'));
    }

}
