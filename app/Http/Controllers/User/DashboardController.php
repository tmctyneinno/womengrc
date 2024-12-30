<?php

namespace App\Http\Controllers\User;

use Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Transaction;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index(){
        $data['mentorCount'] = auth()->user()->mentors()->count();
        $data['menteeCount'] = auth()->user()->mentees()->count();
        $data['pendingInvitationsCount'] = auth()->user()->mentorInvitations()->where('status', 'pending')->count();


        return view('user.dashboard', $data); 
    } 

    
    
}
