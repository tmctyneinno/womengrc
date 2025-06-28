<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MenuItem;
use App\Models\DropdownItem;
use App\Models\Slider;
use App\Http\Traits\AdminTrait;
use Illuminate\Support\Facades\File;
use Exception;

class SliderController extends Controller
{ 
    use AdminTrait;
    public function __construct()
    {
        $this->middleware('auth.admin');
    }


    public function index(){
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create(){
        return view('admin.slider.create');
    }
   
    public function store(Request $request)
    { 
        try{
           
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'caption' => 'required|string',
            ]);
            $imagePath = $this->uploadImageSlider($request->image);
            
            Slider::create(array_merge($request->only([
                'title', 'caption', 
            ]), ['image' => $imagePath]));

            return redirect()->route('admin.slider.index')->with('success', 'Slider created successfully.');
        } catch (Exception $e) {
            return redirect()->route('admin.slider.create')->with('error', 'Slider creation failed. ' . $e->getMessage());
        }
    }
   


    public function edit($id)
    {
        $slider = Slider::findOrFail(decrypt($id));
        return view('admin.slider.edit', compact('slider'));
    }

    public function updatee(Request $request, $id)
    {
        $this->validateSlider($request, false);
        $slider = Slider::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImageSlider($request->image);
            $slider->image = $imagePath; 
        }

        $slider->update($request->only(['title', 'caption']));

        if ($request->hasFile('image')) {
            $slider->save();
        }

        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully.');
    }

    public function update(Request $request, $id)
{
    // Validate the incoming request
    $request->validate([
        'title' => 'required|string|max:255',
        'caption' => 'nullable|string|max:1000',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:6048',  // Validate the image (optional)
    ]);

    // Find the slider by ID
    $slider = Slider::findOrFail($id);

    // Update the title and caption
    $slider->title = $request->input('title');
    $slider->caption = $request->input('caption');

    // Check if a new image was uploaded
    if ($request->hasFile('image')) {
        // Get the uploaded image file
        $image = $request->file('image');

        // Generate a unique file name to avoid overwriting
        $imageName = time() . '-' . $image->getClientOriginalName();

        // Define the path to save the image
        $imagePath = public_path('assets/images/slider/');

        // Ensure the directory exists
        if (!File::exists($imagePath)) {
            File::makeDirectory($imagePath, 0755, true);
        }

        // Move the uploaded file to the public directory
        $image->move($imagePath, $imageName);

        // If the slider already has an image, delete the old one
        if ($slider->image && File::exists(public_path($slider->image))) {
            File::delete(public_path($slider->image));
        }

        // Update the slider with the new image path
        $slider->image = 'assets/images/slider/' . $imageName;
    }

    // Save the updated slider
    $slider->save();

    // Redirect to the slider index or wherever you want, with a success message
    return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully');
}




    protected function validateSlider(Request $request, $isCreate)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'caption' => 'nullable|string',
        ];

        if ($isCreate) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        $request->validate($rules);
    }
    
 
    
    public function destroy($slider)
    {
        $slider = Slider::findOrFail(decrypt($slider));
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Slider deleted successfully.');
    }

   
}
