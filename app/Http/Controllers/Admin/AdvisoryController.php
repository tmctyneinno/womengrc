<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advisory;


class AdvisoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Advisory::all();
        return view('admin.advisory.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advisory.create');
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
    
        $advisoryData = $request->only(['name', 'position', 'content']);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('advisorys'), $imageName);
            $advisoryData['image'] = 'advisorys/'.$imageName;
        }
    
        Advisory::create($advisoryData);
    
        return redirect()->route('admin.advisory.create')
                         ->with('success', 'Advisory created successfully.');
    }

    public function edit($id){
        $advisory = Advisory::findOrFail(decrypt($id));
        return view('admin.advisory.edit', compact('advisory'));
    } 

    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $advisoryData = $request->only(['name', 'position', 'content']);
        $advisory = Advisory::findOrFail($id); 
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($advisory->image) {
                $oldImagePath = public_path($advisory->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('advisorys'), $imageName);
            $advisoryData['image'] = 'advisorys/' . $imageName;
        }

        $advisory->update($advisoryData);

        return redirect()->route('admin.advisory.index')
                        ->with('success', 'Advisory updated successfully.');
    }

    public function destroy($id) 
    {
        $advisory = Advisory::findOrFail(decrypt($id));
        $advisory->delete();

        return redirect()->back()
                         ->with('success', 'Advisory deleted successfully.');
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
