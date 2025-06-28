<?php

namespace App\Http\Controllers\Facilitator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilitatorDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index(){
        return view('facilitator.dashboard', ); 
    } 

}
