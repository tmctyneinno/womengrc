<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\SettingsTrait;
use App\Models\ContactUs;
use App\Models\ExecutiveSummary;
use App\Models\OfficeHours; 
use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use App\Models\About;
use Illuminate\Validation\ValidationException; 
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SettingsController extends Controller
{ 
    use SettingsTrait;
    public function WhyChooseUs(){ 
        return view('admin.settings.index');
    } 

    public function storeWhyChooseUs(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'first_title' => 'required|string',
                'first_content' => 'required|string',
                'second_title' => 'required|string',
                'second_content' => 'required|string',
                'third_title' => 'required|string',
                'third_content' => 'required|string',
                'four_title' => 'required|string',
                'four_content' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('whyChooseUsImage'), $imageName);
            }
    
            WhyChooseUs::create([
                'first_title' => $validatedData['first_title'],
                'first_content' => $validatedData['first_content'],
                'second_title' => $validatedData['second_title'],
                'second_content' => $validatedData['second_content'],
                'third_title' => $validatedData['third_title'],
                'third_content' => $validatedData['third_content'],
                'four_title' => $validatedData['four_title'],
                'four_content' => $validatedData['four_content'],
                'image' => 'whyChooseUsImage/'.$imageName
            ]);
    
            return redirect()->back()->with('success', 'Why Choose Us statement added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Why Choose Us statement. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }
 
    public function updateWhyChooseUs(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'first_title' => 'required|string',
                'first_content' => 'required|string',
                'second_title' => 'required|string',
                'second_content' => 'required|string',
                'third_title' => 'required|string',
                'third_content' => 'required|string',
                'four_title' => 'required|string',
                'four_content' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);
    
            $whyChooseUs = WhyChooseUs::findOrFail($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('whyChooseUsImage'), $imageName);
                
                $whyChooseUs->update(['image' =>  'whyChooseUsImage/' . $imageName]);
            } 
    
            $whyChooseUs->update([
                'first_title' => $validatedData['first_title'],
                'first_content' => $validatedData['first_content'],
                'second_title' => $validatedData['second_title'],
                'second_content' => $validatedData['second_content'],
                'third_title' => $validatedData['third_title'],
                'third_content' => $validatedData['third_content'],
                'four_title' => $validatedData['four_title'],
                'four_content' => $validatedData['four_content'],
            ]);
    
            return redirect()->back()->with('success', 'Why Choose Us statement updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Record not found. Please try again.')->withInput();
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1]; 
    
            if ($errorCode === 1062) {
                return redirect()->back()->with('error', 'Duplicate entry. Please provide unique values.')->withInput();
            } else {
                return redirect()->back()->with('error', 'Database error: ' . $e->getMessage())->withInput();
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.')->withInput();
        }
    }

    public function getAboutUs(Request $request){
        return view('admin.settings.aboutUs.index'); 
    }

   

    public function getContactUs(Request $request){
        return view('admin.settings.contactUs.index');
    }

    public function storeContactUs(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'nullable|string',
            'website_link' => 'string',
            'first_phone' => 'nullable|string',
            'second_phone' => '',
            'first_email' => 'nullable|email',
            'second_email' => '',
            'first_address' => 'nullable|string',
            'second_address' => '',
            'site_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'footer_logo' => 'image|mimes:jpeg,png,jpg,gif|max:4048',
            'favicon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $siteLogo = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/images/logo'), $siteLogo);
            $validated['site_logo'] = 'assets/images/logo/' . $siteLogo;
        }
        if ($request->hasFile('favicon')) {
            $image = $request->file('favicon');
            $footerLogo = uniqid().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/logo'), $footerLogo);
            $validated['favicon'] = 'assets/images/logo/' . $footerLogo;
        }
        if ($request->hasFile('footer_logo')) {
            $image = $request->file('footer_logo');
            $siteLogo = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/images/logo'), $siteLogo);
            $validated['footer_logo'] = 'assets/images/logo/' . $siteLogo;
        }

        ContactUs::create($validated);

        return redirect()->back()->with('success', 'Contact us created successfully.');
    }
 
    public function updateContactUs(Request $request, $id)
    {
        $validated = $request->validate([
            'company_name' => 'required|string',
            'website_link' => 'string',
            'first_phone' => 'required|string',
            'second_phone' => '',
            'first_email' => 'required|email',
            'second_email' => '',
            'first_address' => 'required|string',
            'second_address' => '',
            'site_logo' => 'image|mimes:jpeg,png,jpg,gif|max:4048',
            'footer_logo' => 'image|mimes:jpeg,png,jpg,gif|max:4048',
            'favicon' => 'image|mimes:jpeg,png,jpg,gif|max:4048',
        ]); 

        $contactUs = ContactUs::findOrFail($id);

        if ($request->hasFile('site_logo')) {
            $image = $request->file('site_logo');
            $imageName = uniqid(). '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/logo'), $imageName);

            // Delete old site_logo file if exists
            if ($contactUs->site_logo) {
                $oldImagePath = public_path($contactUs->site_logo);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $contactUs->site_logo = 'assets/images/logo/' . $imageName;
        }

        if ($request->hasFile('footer_logo')) {
            $imageFooter = $request->file('footer_logo');
            $imageNameFooter = uniqid(). '.' . $imageFooter->getClientOriginalExtension();
            $imageFooter->move(public_path('assets/images/logo'), $imageNameFooter);

            // Delete old footer_logo file if exists
            if ($contactUs->footer_logo) {
                $oldImagePath = public_path($contactUs->footer_logo);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $contactUs->footer_logo = 'assets/images/logo/' . $imageNameFooter;
        }
        if ($request->hasFile('favicon')) {
            $imagefavicon = $request->file('favicon');
            $imageNameFavicon = uniqid(). '.' . $imagefavicon->getClientOriginalExtension();
            $imagefavicon->move(public_path('assets/images/logo'), $imageNameFavicon);

            // Delete old footer_logo file if exists
            if ($contactUs->favicon) {
                $oldImagePath = public_path($contactUs->favicon);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $contactUs->favicon = 'assets/images/logo/' . $imageNameFavicon;
        }

        $contactUs->company_name = $validated['company_name'];
        $contactUs->first_phone = $validated['first_phone'];
        $contactUs->second_phone = $validated['second_phone'];
        $contactUs->first_email = $validated['first_email'];
        $contactUs->second_email = $validated['second_email'];
        $contactUs->first_address = $validated['first_address'];
        $contactUs->second_address = $validated['second_address'];
        $contactUs->website_link = $validated['website_link'];

        $contactUs->save();

        return redirect()->back()->with('success', 'Contact us updated successfully.');
    }
 
    public function storeExecutiveSummary(Request $request){
        $validated = $request->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        
        $imagePath = $this->uploadImageExecutiveSummary($request, 'image', 'executiveSummaryImage');
        ExecutiveSummary::create(array_merge($validated, 
        [
            'image' => $imagePath,
        ]
        ));

        return redirect()->back()->with([
            'successAboutus' => 'Executive Summarysuccessfully.',
            'active_tab' => 'v-pills-profile' 
        ]);
        //  return redirect()->route('admin.settings.content')->with('success', 'Data created successfully.');
   
    }
 
    public function updateExecutiveSummary(Request $request, $id){
        $validated = $request->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);
        $executiveSummary = ExecutiveSummary::findOrFail($id);
       
        $this->handleUpdateExecutiveSummaryImage($request, $executiveSummary);
        $executiveSummary->update([
            'content' => $validated['content'],
        ]);
 
        return redirect()->route('admin.settings.content')->with([
            'success' => 'Executive Summary updated successfully.',
        ]);
    }
 
    public function indexOfficeHours(Request $request){
        return view('admin.settings.officeHours.index');
    }

    public function storeOfficeHours(Request $request){
        $validated = $request->validate([ 
            'content' => 'required',
        ]);
        
        OfficeHours::create($validated);
        return redirect()->back()->with('success', 'Office Hours created successfully.');
   
    }

    public function updatestoreOfficeHours(Request $request, $id){
        $validated = $request->validate([
            'content' => 'required',
        ]);
        $officeHours = OfficeHours::findOrFail($id);
       
        $officeHours->update([
            'content' => $validated['content'],
        ]);
 
        return redirect()->back()->with([
            'success' => 'Office Hours updated successfully.',
        ]);
    }
}
