<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;
use Mail;
use App\Models\FaqStore;

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

    public function faqStore(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string|max:15',
            'msg_subject' => 'required|exists:faqs,id', 
            'message' => 'required|string|max:2000',
        ]);

        // Retrieve the FAQ for the selected subject
        $faq = Faq::where('id', $request->msg_subject)->first();
        // dd( $faq);
        // Prepare email data or other processing
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'subject' => $faq->question, // Use the FAQ question as the subject
            'userMessage' => $request->message,
        ];
        FaqStore::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'subject' => $faq->question, // Use the FAQ question as the subject
            'message' => $request->message,
        ]);

        // Send an email (optional)
        Mail::send('emails.faqSubmit', $data, function ($message) use ($data) {
            $message->to('info@wgrcfp.org') // Replace with your support email
                ->subject('New Contact Form Submission');
        });
        return redirect()->back()->with('success', 'Your message has been sent successfully!');

        // Return success response
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
