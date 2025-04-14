<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\UserRoleUpdated;
use App\Models\User;

class UserController extends Controller
{
    /** 
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $users = User::latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail(decrypt($id));
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:advisory_member,guests,mentor,mentee',
        ]);

        $user->role = $request->role;
        $user->save();
        
        $user->notify(new UserRoleUpdated($user));

        return redirect()->route('admin.users.edit', encrypt($user->id) )->with('success', 'User role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // app/Http/Controllers/Admin/UserController.php
    public function destroy(User $user)
    {
        try {
            $user->delete();
            
            return redirect()->route('admin.users.index')
                ->with('success', 'User deleted successfully.');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error deleting user: '.$e->getMessage());
        }
    }

    public function multiDelete(Request $request)
    {
        // Prevent deleting yourself
        if ($user->id === auth()->id()) {
            return redirect()->back()
                ->with('error', 'You cannot delete your own account!');
        }
        if(empty($request->selected_ids)) {
            return back()->with('error', 'No users selected');
        }
        $request->validate([
            'selected_ids' => 'required|array',
            'selected_ids.*' => 'exists:users,id'
        ]);

        try {
            User::whereIn('id', $request->selected_ids)->delete();
            return back()->with('success', 'Selected users deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting users: ' . $e->getMessage());
        }
    }
}
