<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sociallink;
use Illuminate\Http\Request;

class SociallinkController extends Controller
{ 
    public function index(Request $request){
        return view('admin.settings.socialLink.index');
    }

    public function storeSocialLinks(Request $request){ 
        $data = $request->validate([
            'facebook' => 'required|string|max:50',
            'twitter' => 'string|max:50',
            'whatsapp' => 'max:50',
            'instagram' => 'max:50',
            'linkedin' => 'max:50',
            'youtube' => 'max:50',
        ]);

        Sociallink::create($data);
        return redirect()->back()->with('success', 'Social Link created successfully.');
    }

    public function updateSocialLinks(Request $request, $id)
    {
        $data = $request->validate([
            'facebook' => 'required|string|max:50',
            'twitter' => 'string|max:50',
            'whatsapp' => 'max:50',
            'instagram' => 'max:50',
            'linkedin' => 'max:50',
            'youtube' => 'max:50',
        ]);
        $socialLink = Sociallink::findOrFail($id);
        $socialLink->update($data);

        return redirect()->back()->with('success', 'Social Link updated successfully.');
    }
}
