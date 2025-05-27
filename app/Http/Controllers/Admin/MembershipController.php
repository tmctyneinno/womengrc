<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipCriteria; 
use App\Models\MembershipContent; 
use App\Models\MembershipPlan; 
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index(){
        $membershipContent = MembershipContent::first();
        return view('admin.membership.index', compact('membershipContent'));
    }

    public function store(Request $request)
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
                $image->move(public_path('assets/images/membership'), $imageName);
            }
    
            MembershipContent::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'image' => 'assets/images/membership/'.$imageName
            ]);
    
            return redirect()->back()->with('success', 'Membership added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Membership. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);
    
            $membershipContent = MembershipContent::findOrFail($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('assets/images/membership'), $imageName);
                
                $membershipContent->update(['image' =>  'assets/images/membership/' . $imageName]);
            } 
    
            $membershipContent->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'membership updated successfully.');
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

    public function indexCriteria(){
        $membershipContent = MembershipCriteria::first();
        return view('admin.membership.criteria.index', compact('membershipContent'));
    }

    public function storeCriteria(Request $request)
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
                $image->move(public_path('assets/images/membership'), $imageName);
            }
    
            MembershipCriteria::create([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
                'image' => 'assets/images/membership/'.$imageName 
            ]);
    
            return redirect()->back()->with('success', 'Membership Criteria added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Membership. Please try again.'. $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.'. $e->getMessage());
        }
    }

    public function updateCriteria(Request $request, $id)
    {
        try {
            
            $validatedData = $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);
    
            $membershipCriteria = MembershipCriteria::findOrFail($id);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->extension();
                $image->move(public_path('assets/images/membership'), $imageName);
                
                $membershipCriteria->update(['image' =>  'assets/images/membership/' . $imageName]);
            } 
    
            $membershipCriteria->update([
                'title' => $validatedData['title'],
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'Membership Criteria updated successfully.');
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
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.'. $e->getMessage())->withInput();
        }
    }

    public function plans(){
        $membershipPlan = MembershipPlan::latest()->get();
        return view('admin.membership.plan.index', compact('membershipPlan'));
    }


}
