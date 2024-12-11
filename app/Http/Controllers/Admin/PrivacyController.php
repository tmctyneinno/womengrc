<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index(Request $request){
        return view('admin.settings.privacyPolicy.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        PrivacyPolicy::create([
            'content' => $validatedData['content'],
        ]);

        return redirect()->back()->with('success', 'Privacy added successfully.');
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        // Create a new PrivacyPolicy instance and store in the database
        $item = PrivacyPolicy::findOrFail($id);
        $item->update([
            'content' => $validatedData['content'],
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Privacy updated successfully.');
    }
}
