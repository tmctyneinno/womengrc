<?php

namespace App\Http\Controllers\Admin;
use Http; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{ 
    public function index(){
        return view('admin.contact.index');
    }

    public function store(Request $request)
    {
        // Validate form input along with reCAPTCHA
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);
  
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Validate reCAPTCHA token
        $recaptcha = $request->input('g-recaptcha-response');
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secretKey'), 
            'response' => $recaptcha,
            'remoteip' => $request->ip(), 
        ]);
    
        $recaptchaData = $response->json(); 
        // dd($recaptchaData);

        $recaptcha_success = $recaptchaData['success'] ?? false; 
    
        // If reCAPTCHA validation fails
        if (!$recaptcha_success) {
            return redirect()->back()->withInput()->withErrors(['recaptcha' => 'Please verify that you are not a robot.']);
        }
        ContactForm::create($request->all());
    
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }

    public function show($id){
        $contact = ContactForm::findOrFail(decrypt($id));
        return view('admin.contact.show', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = ContactForm::find(decrypt($id));

        if (!$contact) {
            return redirect()->back()->with('error', 'Contact us Form data not found.');
        }

        $contact->delete();

        return redirect()->back()->with('success', 'Contact us Form data deleted successfully.');
    }
}
 