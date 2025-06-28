<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        return view('admin.settings.index');
    }

    public function getTeam(Request $request){
        return view('admin.settings.team.index');
    }

    public function create(){
     
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
    
        $teamData = $request->only(['name', 'position', 'content']);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('teams'), $imageName);
            $teamData['image'] = 'teams/'.$imageName;
        }
    
        Team::create($teamData);
    
        return redirect()->route('admin.team.create')
                         ->with('success', 'Team created successfully.');
    }

    public function edit($id){
        $team = Team::findOrFail(decrypt($id));
        return view('admin.teams.edit', compact('team'));
    } 

    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $teamData = $request->only(['name', 'position', 'content']);
        $team = Team::findOrFail($id); 
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($team->image) {
                $oldImagePath = public_path($team->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('teams'), $imageName);
            $teamData['image'] = 'teams/' . $imageName;
        }

        $team->update($teamData);

        return redirect()->route('admin.team.getTeam')
                        ->with('success', 'Team updated successfully.');
    }

    public function destroy($id) 
    {
        $team = Team::findOrFail(decrypt($id));
        $team->delete();

        return redirect()->route('admin.team.getTeam')
                         ->with('success', 'Team deleted successfully.');
    }

    public function show($id){
        $team = Team::findOrFail(decrypt($id));
        return view('users.pages.team_detail', compact('team'));
    }
    
}
