<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\LiveStream;
use Illuminate\Http\Request;

class LivestreamController extends Controller
{
    public function index(){
       
        return view('admin.livestream.index');
    }

    public function create(){
        return view('admin.livestream.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);
        LiveStream::create(array_merge($validated));
    
        return redirect()->route('admin.livestream.create')->with('success', 'LiveStream created successfully.');
    }

    public function edit($id)
    {
        $livestream = LiveStream::findOrFail(decrypt($id));
        return view('admin.liveStream.edit', compact('livestream'));
    } 

    public function update(Request $request, $id)
    { 
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required', 
            'url' => 'required', 
        ]);
    
        $liveStream = LiveStream::findOrFail($id);   
        $liveStream->update($validated);
    
        return redirect()->route('admin.livestream.index')->with('success', 'LiveStream updated successfully.');
    }
    

    public function destroy($id)
    {
        $liveStream= LiveStream::findOrFail(decrypt($id));
        $liveStream->delete();
        return redirect()->route('admin.livestream.index')->with('success', 'LiveStream deleted successfully.');
    }

}
 