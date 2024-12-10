<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('home.index'); 
    }

    public function about(){
        return view('home.pages.about'); 
    }

    public function vision(){
        return view('home.pages.vision'); 
    }

    public function purpose(){
        return view('home.pages.purpose'); 
    }

    public function mission(){
        return view('home.pages.mission'); 
    }
 
    public function event(){
        return view('home.pages.event'); 
    }

    public function blog(){
        return view('home.pages.blog'); 
    }

    public function faq(){
        return view('home.pages.faq');
    }

    public function contact(){
        return view('home.pages.contact'); 
    }
 
    public function privacyPolicy(){
        return view('home.pages.privacyPolicy'); 
    }

    public function termsCondition(){
        return view('home.pages.termsCondition'); 
    }
}
