<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\ProgrammeExamination;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    
   
    public function index()
    {
        $certifications = Certification::withCount('users')->paginate(15);
        return view('admin.certification.training.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certification.training.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'certification_code' => 'required|unique:certifications',
            'duration_hours' => 'required|numeric|min:1',
            'due_date' => 'nullable|date',
            'is_required' => 'boolean',
            'certificate_template' => 'nullable|file|mimes:pdf|max:2048'
        ]);

        if ($request->hasFile('certificate_template')) {
            $image = $request->file('certificate_template');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/document/certification/'), $imageName);
        }

        Certification::create($validated);

        return redirect()->route('admin.certifications.index')
            ->with('success', 'Certification created successfully');
    }

    public function edit($id)
    {
        $certification = Certification::findOrFail($id);
        return view('admin.certification.training.create', compact('certification'));
    }

    public function update(Request $request,  $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'certification_code' => 'required|unique:certifications,certification_code,'.$id,
            'duration_hours' => 'required|numeric|min:1',
            'due_date' => 'nullable|date',
            'is_required' => 'boolean',
            'certificate_template' => 'nullable|file|mimes:pdf|max:2048'
        ]);
        $certification = Certification::findOrFail($id); 
        if ($request->hasFile('certificate_template')) {   
            $image = $request->file('certificate_template');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/certification/'), $imageName);
            
            $certification->update(['image' =>  'assets/document/certification/' . $imageName]);
        } 

        $certification->update($validated);

        return redirect()->route('admin.certifications.index')
            ->with('success', 'Certification updated successfully');
    }

    public function destroy(Certification $certification)
    {
        if ($certification->certificate_template_path) {
            Storage::disk('public')->delete($certification->certificate_template_path);
        }
        
        $certification->delete();
        
        return back()->with('success', 'Certification deleted successfully');
    }
}
