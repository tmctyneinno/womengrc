<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{ 
    public function index(){
        
        return view('admin.resource.index');
    }

    public function create(){
        return view('admin.resource.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/resource/'), $imageName);
        }
        
        Resource::create(array_merge($validated, ['image' => 'assets/images/resource/'.$imageName]));
    
        return redirect()->route('admin.resource.create')->with('success', 'Resource created successfully.');
    }

    public function edit($id)
    {
        $resource = Resource::findOrFail(decrypt($id));
        return view('admin.resource.edit', compact('resource'));
    } 

    public function update(Request $request, $id)
    { 
        // Validate the incoming request data
        $validated = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:32768', 
        ]);
    
        $resource = Resource::findOrFail($id);   
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/resource/'), $imageName);
             
            $resource->update(['image' =>  'assets/images/resource/' . $imageName]);
        } 
       
        
    
        return redirect()->route('admin.resource.index')->with('success', 'Resource updated successfully.');
    }
    

    public function destroy($id)
    {
        $resource= Resource::findOrFail(decrypt($id));
        $resource->delete();
        return redirect()->route('admin.resource.index')->with('success', 'Resource deleted successfully.');
    }

    public function show($slug)
    {
        $resourceItem = Resource::where('slug', $slug)->first();

        if (!$resourceItem) {
            return view('home.errors.404'); 
        }

        $relatedResource = Resource::where('id', '!=', $resourceItem->id)
                                     ->inRandomOrder()
                                     ->take(6) 
                                     ->get();
        $relatedPost = Blog::inRandomOrder()
                                     ->take(6) 
                                     ->get();

        return view('home.pages.resource.resource-details', compact('resourceItem', 'relatedResource','relatedPost'));
    }

    public function details($slug){
        $resourceItem = Resource::where('slug', $slug)->first();
    
        if (!$resourceItem) {
            return view('home.errors.404'); 
        }

        $relatedResource = Resource::where('slug', '!=', $slug)
                                ->latest()
                                ->get();
    
        return view('home.pages.resource.resource-details', compact('resourceItem', 'relatedResource'));
    }
}
 