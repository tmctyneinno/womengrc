<?php

namespace App\Http\Controllers\Advisory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdvisoryDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index(){
        return view('advisory.dashboard', ); 
    } 

}
