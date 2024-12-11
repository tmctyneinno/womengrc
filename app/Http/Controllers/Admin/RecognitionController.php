<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recognition;


class RecognitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Recognition::all();
        return view('admin.recognition.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.recognition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
    
        $recognitionData = $request->only(['name', 'position', 'content']);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('recognitions'), $imageName);
            $recognitionData['image'] = 'recognitions/'.$imageName;
        }
    
        Recognition::create($recognitionData);
    
        return redirect()->route('admin.recognition.create')
                         ->with('success', 'Recognition created successfully.');
    }

    public function edit($id){
        $recognition = Recognition::findOrFail(decrypt($id));
        return view('admin.recognition.edit', compact('recognition'));
    } 

    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $recognitionData = $request->only(['name', 'position', 'content']);
        $recognition = Recognition::findOrFail($id); 
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($recognition->image) {
                $oldImagePath = public_path($recognition->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('recognitions'), $imageName);
            $recognitionData['image'] = 'recognitions/' . $imageName;
        }

        $recognition->update($recognitionData);

        return redirect()->route('admin.recognition.index')
                        ->with('success', 'Recognition updated successfully.');
    }

    public function destroy($id) 
    {
        $recognition = Recognition::findOrFail(decrypt($id));
        $recognition->delete();

        return redirect()->back()
                         ->with('success', 'Recognition deleted successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   
}
