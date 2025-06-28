<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Http;

class TestimonialsController extends Controller
{
    public function index(){
        return view('admin.testimonials.index');
    }

    public function create(){
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required',
            // 'image' => 'image|mimes:jpeg,png,svg,jpg,gif|max:5048',
            'author_name' => 'required',
            'author_title' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = uniqid()  . '.' . $image->extension();
            $image->move(public_path('assets/images/testimonials'), $imageName);
        }

        // Testimonials::create(array_merge($validated, ['image' => 'assets/images/testimonials/'.$imageName]));
        Testimonial::create(array_merge($validated));
        return redirect()->route('admin.testimonials.create')->with('success', 'Testimonials created successfully.');
    }

    public function edit($id)
    {
        $testimonials = Testimonials::findOrFail(decrypt($id));
        return view('admin.testimonials.edit', compact('testimonials'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required',
            // 'image' => 'image|mimes:jpeg,png,svg,jpg,gif|max:5048',
            'author_name' => 'required',
            'author_title' => 'required',
        ]);
    
        // Find the service record by ID
        $testimonial = Testimonial::findOrFail($id);  
        // if ($request->hasFile('image')) {
        //     if ($testimonial->image && file_exists(public_path($testimonial->image))) {
        //         unlink(public_path($testimonial->image));
        //     }

        //     $image = $request->file('image');
        //     $imageName = uniqid() . '.' . $image->extension();
        //     $image->move(public_path('assets/images/testimonials'), $imageName);
        //     $testimonial->image = 'assets/images/testimonials/' . $imageName;
        // }  
        $testimonial->content = $validated['content'];
        $testimonial->author_name = $validated['author_name'];
        $testimonial->author_title = $validated['author_title'];
        $testimonial->save();
    
        return redirect()->back()->with('success', 'Testimonials updated successfully.');
    }
    
    public function destroy($id)
    {
        $testimonials= Testimonial::findOrFail(decrypt($id));
        $testimonials->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonials deleted successfully.');
    }

}
