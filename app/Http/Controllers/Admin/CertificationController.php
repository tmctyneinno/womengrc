<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExamRequirement;
use App\Models\ProgrammeExamination;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index(){
        return view('admin.certification.programmeExamination.index');
    }

    public function programmeExamination(){
        return view('admin.certification.programmeExamination.index');
    }
    
    public function programmeExaminationStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
            ]);

            ProgrammeExamination::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'Programme Examination added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Programme Examination. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }
 
    public function programmeExaminationUpate(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);
    
            $programmeExamination = ProgrammeExamination::findOrFail($id);
           
    
            $programmeExamination->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'Programme Examination updated successfully.');
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

    public function examRequirement(){
        return view('admin.certification.examRequirement.index');
    }

    public function examRequirementStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('assets/images/examRequirement'), $imageName);
            }
    
            ExamRequirement::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'image' => 'assets/images/examRequirement/'.$imageName
            ]);
    
            return redirect()->back()->with('success', 'Exam Requirement added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Exam Requirement. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }
 
    public function examRequirementUpate(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);
    
            $examRequirement = ExamRequirement::findOrFail($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('assets/images/examRequirement'), $imageName);
                
                $examRequirement->update(['image' =>  'assets/images/examRequirement/' . $imageName]);
            } 
    
            $examRequirement->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'Exam Requirement updated successfully.');
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

    public function membersSubscriptionFees(){
        return view('admin.members.membersSubscriptionFees.index');
    }

    public function membersSubscriptionFeesStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('assets/images/membersSubscriptionFees'), $imageName);
            }
    
            MembersSubscriptionFees::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'image' => 'assets/images/membersSubscriptionFees/'.$imageName
            ]);
    
            return redirect()->back()->with('success', 'Members Subscription Fees added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Members Subscription Fees. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }
 
    public function membersSubscriptionFeesUpate(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);
    
            $membersSubscriptionFees = MembersSubscriptionFees::findOrFail($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('assets/images/membersSubscriptionFees'), $imageName);
                
                $membersSubscriptionFees->update(['image' =>  'assets/images/membersSubscriptionFees/' . $imageName]);
            } 
    
            $membersSubscriptionFees->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'Members Subscription Fees updated successfully.');
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

    public function membershipTiers(){
        return view('admin.members.membershipTiers.index');
    }

    public function membershipTiersStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
            ]);

           
            MembershipTiers::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'image' => null
            ]);
    
            return redirect()->back()->with('success', 'Membership Tiers added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Membership Tiers. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }
 
    public function membershipTiersUpate(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
            ]);
    
            $membershipTiers = MembershipTiers::findOrFail($id);
            
    
            $membershipTiers->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'Membership Tiers updated successfully.');
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

    public function membersProgramme(){
        return view('admin.members.membersProgramme.index');
    }

    public function membersProgrammeStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
            ]);

           
            MembersProgramme::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'Members Programme added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add MembersProgramme. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }
 
    public function membersProgrammeUpate(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
            ]);
    
            $membersProgramme = MembersProgramme::findOrFail($id);
            
    
            $membersProgramme->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'MembersProgramme updated successfully.');
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
}
