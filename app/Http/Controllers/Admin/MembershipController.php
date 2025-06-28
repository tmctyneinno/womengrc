<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MembershipCriteria; 
use App\Models\MembershipContent; 
use App\Models\MembershipPlan; 
use App\Models\MembershipPlans2; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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

    public function plan(){
        $individualMemberships = MembershipPlans2::where('type', 'individual')->get();
        $corporateMemberships = MembershipPlans2::where('type', 'corporate')->get();
        
        return view('admin.membership.plan.index', compact('individualMemberships', 'corporateMemberships'));
    }

    public function createPlan()
    { 
        $individualMemberships = MembershipPlans2::where('type', 'individual')->get();
        $corporateMemberships = MembershipPlans2::where('type', 'corporate')->get();
        
        return view('admin.membership.plan.create', compact('individualMemberships', 'corporateMemberships'));
    }

    public function storePlan(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:individual,corporate',
            'name' => 'required|string|max:255|unique:membership_plans2s',
            'target_audience' => 'required|string',
            'key_benefits' => 'required|string',
            'annual_fee' => 'required|numeric|min:0',
            'is_active' => 'required|boolean',
            'requires_invitation' => 'boolean',
        ]);
        // Generate slug from the name
        $validated['slug'] = Str::slug($validated['name']);
    
        MembershipPlans2::create($validated);
        
        return redirect()->route('admin.membership.plan.create')
            ->with('success', 'Membership plan created successfully');
    }

    public function editPlan($id)
    { 
        $plan = MembershipPlans2::where('id', $id)->first();
        return view('admin.membership.plan.edit', compact('plan'));
    }

    public function updatePlan(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'type' => 'required|in:individual,corporate',
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'target_audience' => 'required|string',
            'key_benefits' => 'required|string',
            'annual_fee' => 'required|numeric|min:0',
            'is_active' => 'required|boolean',
        ]);
    
        $plan = MembershipPlans2::findOrFail($id);   
        
       
        $plan->update([
            'type' => $request->type,
            'name' => $request->name,
            'target_audience' => $request->target_audience,
            'key_benefits' => $request->key_benefits,
            'annual_fee' => $request->annual_fee,
            'is_active' => $request->is_active,

        ]);

        // Redirect with success message
        return redirect()->route('admin.membership.plan.index')
            ->with('success', 'Membership plan updated successfully');
    }
    
    public function destroyPlan($membership)
    {
        $plan = MembershipPlans2::findOrFail(decrypt($membership));
        $plan->delete();
        
        return redirect()->route('admin.membership.plan.index')
            ->with('success', 'Membership plan deleted successfully');
    }


}
