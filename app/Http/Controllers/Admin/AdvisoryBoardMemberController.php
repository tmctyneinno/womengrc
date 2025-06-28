<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdvisoryBoardMember;

class AdvisoryBoardMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        return view('admin.advocacyPolicy.advisoryBoardMember.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advocacyPolicy.advisoryBoardMember.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/advisoryBoardMember/'), $imageName);
        }
        
        AdvisoryBoardMember::create(array_merge($validated, ['image' => 'assets/images/advisoryBoardMember/'.$imageName]));
    
        return redirect()->route('admin.advisoryBoardMember.create')->with('success', 'Advisory Board Member created successfully.');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = AdvisoryBoardMember::findOrFail(decrypt($id));
        return view('admin.advocacyPolicy.advisoryBoardMember.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required',
            'content' => 'required', 
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:32768', 
        ]);
    
        $data = AdvisoryBoardMember::findOrFail($id);   
        if ($request->hasFile('image')) {
            // Delete the previous image if it exists
            if ($data->image && file_exists(public_path($data->image))) {
                unlink(public_path($data->image));
            }
            // Save the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'assets/images/advisoryBoardMember/';
            $image->move(public_path($imagePath), $imageName);
            // Update image path in the database
            $data->image = $imagePath . $imageName;
        }
       
        $data->update([
            'name' => $request->name,
            'content' => $request->content,
        ]);
    
        return redirect()->route('admin.advisoryBoardMember.index')->with('success', 'Advisory Board Member updated successfully.');
    }
    

    public function destroy($id)
    {
        $data= AdvisoryBoardMember::findOrFail(decrypt($id));
        $data->delete();
        return redirect()->route('admin.advisoryBoardMember.index')->with('success', 'Advisory Board Member deleted successfully.');
    }
}
