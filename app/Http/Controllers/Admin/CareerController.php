<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Career;

class CareerController extends Controller
{
    public function index(){
        return view('admin.career.index');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'content' => 'required|string',
            ]);

            
    
            Career::create([
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'Careers added successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', 'Failed to add Careers. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An unexpected error occurred. Please try again later.');
        }
    }
 
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'content' => 'required|string',
            ]);
    
            $career = Career::findOrFail($id);
           
    
            $career->update([
                'content' => $validatedData['content'],
            ]);
    
            return redirect()->back()->with('success', 'Careers updated successfully.');
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
