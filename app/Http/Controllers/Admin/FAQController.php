<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqsSubmitForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Http;

class FAQController extends Controller
{
    public function index(){
        return view('admin.faq.index');
    }

    public function create(){
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        Faq::create($validated);
        return redirect()->route('admin.faq.create')->with('success', 'FAQ created successfully.');
    }

    public function edit($id)
    {
        $faqs = Faq::findOrFail(decrypt($id));
        return view('admin.faq.edit', compact('faqs'));
    }
 
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);
    
        // Find the service record by ID
        $faqs = Faq::findOrFail($id);    
        $faqs->update($validated);
    
        return redirect()->route('admin.faq.index')->with('success', 'Faqs updated successfully.');
    }
    
    public function destroy($id)
    {
        $faqs= Faq::findOrFail(decrypt($id));
        $faqs->delete();
        return redirect()->route('admin.faq.index')->with('success', 'Faqs deleted successfully.');
    }

   
    public function submitForm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:50',
            'phone_no' => 'required|string|max:20',
            'property_type' => 'required|string',
            'location' => 'required|string',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required',
        ]);

         // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $recaptcha = $request->input('g-recaptcha-response');
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secretKey'),
            'response' => $recaptcha,
            'remoteip' => \request()->ip()
        ]);
        // dd($response->json());
        $recaptcha_success = $response['success'];

        if (!$recaptcha_success) {
            return redirect()->back()->withErrors(['recaptcha' => 'Please verify that you are not a robot.']);
        }
        $data = new FaqsSubmitForm();
        $data->full_name = $request->full_name;
        $data->phone_no = $request->phone_no;
        $data->property_type = $request->property_type;
        $data->location = $request->location;
        $data->message = $request->message;
        $data->save();

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Message sent successfully!');
    }

    public function submtFormView(){
        $faqSubmitForm = FaqsSubmitForm::latest()->get();
        return view('admin.faqSubmitForm.index', compact('faqSubmitForm'));
    }

    public function submitFormShow($id){
        $faqs = FaqsSubmitForm::findOrFail(decrypt($id));
        return view('admin.faqSubmitForm.show', compact('faqs'));
    }

    public function submitFormDestroy($id){
        $faqs= FaqsSubmitForm::findOrFail(decrypt($id));
        $faqs->delete();
        return redirect()->back()->with('success', 'Faqs Form deleted successfully.');
    }

}
