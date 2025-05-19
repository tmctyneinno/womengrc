<?php

namespace App\Http\Controllers\User;

use Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index(){
        $user = Auth::user();
        // dd($user->role);
        switch ($user->role) {
            case 'facilitator':
                Log::info('User is facilitator, redirecting from user.dashboard to facilitator.dashboard.', ['user_id' => $user->id]);
                return redirect()->route('facilitator.dashboard');
            case 'advisory_member': 
                Log::info('User is advisory_member, redirecting from user.dashboard to advisory.dashboard.', ['user_id' => $user->id]);
                return redirect()->route('advisory.dashboard');
            case 'guests':
                Log::info('User is guest, redirecting from user.dashboard to guests.dashboard.', ['user_id' => $user->id]);
                // <!-- return redirect()->route('guests.dashboard'); -->
                return redirect()->route('advisory.dashboard');

            default:
                Log::info('User role is default or user-specific, showing user.dashboard.', ['user_id' => $user->id, 'role' => $user->role]);
                $data['mentorCount'] = $user->mentors()->count();
                $data['menteeCount'] = $user->mentees()->count();
                $data['pendingInvitationsCount'] = $user->mentorInvitations()->where('status', 'pending')->count();
               
                return view('user.dashboard', $data);
        }
    } 
    
}
