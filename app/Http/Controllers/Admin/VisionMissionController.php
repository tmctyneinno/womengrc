<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisionMission; 

class VisionMissionController extends Controller
{  
    public function index(){ 
        return view('admin.settings.visionMission.index');
    }

    public function store(Request $request)
    { 
        try {
            $validatedData = $request->validate([
                'mission' => 'required|string',
                'mission_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'vision' => 'required|string',
                'vision_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'purpose' => 'required|string',
                'purpose_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);

            $missionName = null;
            $visionName = null;
            $purposeName = null;

            if ($request->hasFile('mission_img')) {
                $image = $request->file('mission_img');
                $missionName = uniqid() . '.' . $image->extension();
                $image->move(public_path('assets/images/mission'), $missionName);
            }
            if ($request->hasFile('vision_img')) {
                $image = $request->file('vision_img');
                $visionName = uniqid() . '.' . $image->extension();
                $image->move(public_path('assets/images/vision'), $visionName);
            }
            if ($request->hasFile('purpose_img')) {
                $image = $request->file('purpose_img');
                $visionName = uniqid() . '.' . $image->extension();
                $image->move(public_path('assets/images/purpose'), $purposeName);
            }
           
            $missionImage = 'assets/images/mission/' . $missionName;
            $visionImage = 'assets/images/vision/' . $visionName;
            $purposeImage = 'assets/images/purpose/' . $purposeName;
                
            VisionMission::create([
                'mission' => $validatedData['mission'],
                'mission_img' => $missionImage,
                'vision' => $validatedData['vision'],
                'vision_img' => $visionImage,
                'purpose' => $validatedData['purpose'],
                'purpose_img' => $purposeImage,
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
                'mission' => 'required|string',
                'mission_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'vision' => 'required|string',
                'vision_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
                'purpose' => 'required|string',
                'purpose_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);

            $visionMission = VisionMission::findOrFail($id);

            
            if ($request->hasFile('mission_img')) {
                $image = $request->file('mission_img');
                $missionImage = uniqid() . '.' . $image->extension(); 
                $image->move(public_path('assets/images/mission'), $missionImage); 
                
                $visionMission->mission_img = 'assets/images/mission/' . $missionImage;
            } 
            
            if ($request->hasFile('vision_img')) {
                $image = $request->file('vision_img');
                $visionImage = uniqid() . '.' . $image->extension(); 
                $image->move(public_path('assets/images/vision'), $visionImage); 
                
                $visionMission->vision_img = 'assets/images/vision/' . $visionImage;
            } 

            if ($request->hasFile('purpose_img')) {
                $image = $request->file('purpose_img');
                $purposeImage = uniqid() . '.' . $image->extension(); 
                $image->move(public_path('assets/images/purpose'), $purposeImage); 
                
                $visionMission->purpose_img = 'assets/images/purpose/' . $purposeImage;
            } 
            
            $visionMission->mission = $validatedData['mission'];
            $visionMission->vision = $validatedData['vision'];
            $visionMission->purpose = $validatedData['purpose'];

            $visionMission->save(); 

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
