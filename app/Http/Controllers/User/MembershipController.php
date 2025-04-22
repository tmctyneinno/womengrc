<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class MembershipController extends Controller
{
    

    public function viewBenefits()
    {
        $benefits = Benefit::all(); 
        return view('user.membership.benefits.index', compact('benefits'));
    }

    public function renewMembership()
    {
        return view('membership.membership.renew'); 
    }
}
