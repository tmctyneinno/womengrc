<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CoreValue; 

class CoreValueController extends Controller
{ 
    public function index(){ 
        return view('admin.settings.coreValue.index');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'core_value' => 'required|string',
                'core_values_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'mission' => 'required|string',
                'mission_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'vision' => 'required|string',
                'vision_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);

            $missionName = null;
            $visionName = null;

            if ($request->hasFile('mission_img')) {
                $image = $request->file('mission_img');
                $missionName = time() . '.' . $image->extension();
                $image->move(public_path('assets/images/mission'), $missionName);
            }
            if ($request->hasFile('vision_img')) {
                $image = $request->file('vision_img');
                $visionName = time() . '.' . $image->extension();
                $image->move(public_path('assets/images/vision'), $visionName);
            }
           
            $missionImage = 'assets/images/mission/' . $missionName;
            $visionImage = 'assets/images/vision/' . $visionName;
                
            CoreValue::create([
                'core_values' => '',
                'core_values_img' => '',
                'mission' => $validatedData['mission'],
                'mission_img' => $missionImage,
                'vision' => $validatedData['vision'],
                'vision_img' => $visionImage,
            ]);

            // Redirect back with success message
            return redirect()->back()->with('success', 'Core value statement added successfully.');
            
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add core value statement. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.'.$e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        try {
           
            $validatedData = $request->validate([
                'core_value' => 'required|string',
                'core_values_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'mission' => 'required|string',
                'mission_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'vision' => 'required|string',
                'vision_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);

            $coreValue = CoreValue::findOrFail($id);

            if ($request->hasFile('core_values_img')) {
                $image = $request->file('core_values_img');
                $coreValueImage = uniqid() . '.' . $image->extension();
                $image->move(public_path('assets/images/core-value'), $coreValueImage); 

                $coreValue->core_values_img = 'assets/images/core-value/' . $coreValueImage;
            } 
            
            if ($request->hasFile('mission_img')) {
                $image = $request->file('mission_img');
                $missionImage = uniqid() . '.' . $image->extension(); 
                $image->move(public_path('assets/images/mission'), $missionImage); 
                
                $coreValue->mission_img = 'assets/images/mission/' . $missionImage;
            } 
            
            if ($request->hasFile('vision_img')) {
                $image = $request->file('vision_img');
                $visionImage = uniqid() . '.' . $image->extension(); 
                $image->move(public_path('assets/images/vision'), $visionImage); 
                
                $coreValue->vision_img = 'assets/images/vision/' . $visionImage;
            } 
            
            $coreValue->core_values = $validatedData['core_value'];
            $coreValue->mission = $validatedData['mission'];
            $coreValue->vision = $validatedData['vision'];

            $coreValue->save(); 

            return redirect()->back()->with('success', 'Core value statement updated successfully.');
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



}
