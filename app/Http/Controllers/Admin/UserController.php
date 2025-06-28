<?php

namespace App\Http\Controllers\Admin;
Use DB;
Use Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\RoleUpdateApprovedNotification;
use App\Notifications\RoleUpdateRejectedNotification;
use App\Notifications\RoleChangeApprovedAdminNotification;
use App\Notifications\RoleChangeRejectedAdminNotification;

use App\Notifications\UserRoleUpdated;
use App\Models\PendingRoleUpdate;
use App\Models\User;

class UserController extends Controller
{

    public function index()
    { 
        $users = User::latest()->paginate(50);
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

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail(decrypt($id));
        return view('admin.users.edit', compact('user'));
    }
    
    public function update(Request $request, User $user)
    { 
        $request->validate([
            'role' => 'required|in:advisory_member,guests,mentor,mentee',
        ]);
        // Instead of updating directly, create a pending update
        $pendingUpdate = PendingRoleUpdate::create([
            'user_id' => $user->id,
            'current_role' => $user->role, // Capture current role
            'new_role' => $request->role,
            'token' => \Illuminate\Support\Str::random(60),
            'expires_at' => now()->addDays(3), 
            'requested_by' => auth()->id(),
        ]);
        // Notify user with the token
        $user->notify(new UserRoleUpdated($user, $pendingUpdate->token, $request->role));
        return redirect()->route('admin.users.edit', encrypt($user->id))
        ->with('success', 'Role update request sent to user for approval.');
    }

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

    public function showResponseForm($token)
    {
        try{
            // $updateRequest = PendingRoleUpdate::where('token', $token)->firstOrFail();
            // // dd($updateRequest);
            // $userToken = $updateRequest->token;
            // return view('auth.role-update.response-form', compact('userToken'));
            $pendingUpdate = PendingRoleUpdate::where('token', $token)
                ->where('status', PendingRoleUpdate::STATUS_PENDING)
                ->where(function($query) {
                    $query->whereNull('expires_at')
                        ->orWhere('expires_at', '>', now());
                })
                ->firstOrFail();
         return view('auth.role-update.response-form', [
                'token' => $pendingUpdate->token,
                'pendingUpdate' => $pendingUpdate
            ]);

        } catch (\Exception $e) {
            return redirect('/login')->with('error', $this->getErrorMessage($token));
        }
        // Check if the token is valid and the request is pending
        if ($pendingUpdate->status !== 'pending') {
            return redirect('/login')->with('error', 'This request has already been processed.');
        }
    }

    protected function getErrorMessage($token)
    {
        $request = PendingRoleUpdate::where('token', $token)->first();

        if (!$request) {
            return 'Invalid request token.';
        }

        if ($request->status === PendingRoleUpdate::STATUS_APPROVED) {
            return 'This role change has already been approved.';
        }

        if ($request->status === PendingRoleUpdate::STATUS_REJECTED) {
            return 'This role change has already been rejected.';
        }

        if ($request->expires_at && $request->expires_at < now()) {
            return 'This request has expired. Please contact an administrator.';
        }

        return 'This request cannot be processed.';
    }

    public function processResponse(Request $request, $token)
    {
        $request->validate([
            'response' => 'required|in:approve,reject',
            'reason' => 'required_if:response,reject|max:500',
        ]);

        // Start database transaction for data consistency
        DB::beginTransaction();

        try {
            $updateRequest = PendingRoleUpdate::where('token', $token)
                ->where('status', PendingRoleUpdate::STATUS_PENDING)
                ->where(function($query) {
                    $query->whereNull('expires_at')
                        ->orWhere('expires_at', '>', now());
                })
                ->firstOrFail();

            $user = User::findOrFail($updateRequest->user_id);

            if ($request->response === 'approve') {
                // Update user role
                $user->role = $updateRequest->new_role;
                $user->save();

                // Update the request status
                $updateRequest->status = PendingRoleUpdate::STATUS_APPROVED;
                $updateRequest->approved_at = now();
                $updateRequest->save();

                // Notify user and admin
                $user->notify(new RoleUpdateApprovedNotification($updateRequest));
                $this->notifyAdminAboutApproval($updateRequest);

                DB::commit();
                
                return redirect('/login')
                    ->with('success', 'Role update approved successfully! Your new role is now active.');
            } else {
                // Reject logic
                $updateRequest->status = PendingRoleUpdate::STATUS_REJECTED;
                $updateRequest->rejection_reason = $request->reason;
                $updateRequest->rejected_at = now();
                $updateRequest->save();

                // Notify user and admin
                $user->notify(new RoleUpdateRejectedNotification($updateRequest));
                $this->notifyAdminAboutRejection($updateRequest);

                DB::commit();
                
                return redirect('/login')
                    ->with('success', 'Role update has been rejected.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Role update failed: " . $e->getMessage());
            
            return redirect('/login')
                ->with('error', 'Failed to process your request. Please try again or contact support.');
        }
    }

    protected function notifyAdminAboutApproval($updateRequest)
    {
        // Get admin users who should be notified
        $admins = User::where('is_admin', true)->get();
        
        foreach ($admins as $admin) {
            $admin->notify(new RoleChangeApprovedAdminNotification($updateRequest));
        }
    }

    protected function notifyAdminAboutRejection($updateRequest)
    {
        // Get admin users who should be notified
        $admins = User::where('is_admin', true)->get();
        
        foreach ($admins as $admin) {
            $admin->notify(new RoleChangeRejectedAdminNotification($updateRequest));
        }
    }
 
    public function makeAdmin(User $user)
    { 
        // Prevent modifying yourself if needed
        if ($user->id === auth('admin')->id()) {
            return back()->with('error', 'You cannot modify your own admin status');
        }

        $user->update(['is_admin' => true]);
        return back()->with('success', "$user->name has been granted admin rights");
    }
    
    public function removeAdmin(User $user)
    {
        // Prevent modifying yourself if needed
        if ($user->id === auth('admin')->id()) {
            return back()->with('error', 'You cannot remove your own admin rights');
        }

        $user->update(['is_admin' => false]);
        return back()->with('success', "Admin rights removed from $user->name");
    }
}
