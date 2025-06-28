<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\GovernanceBoard;
use App\Http\Traits\SettingsTrait;
use Illuminate\Http\Request;
use App\Models\About;

class AboutUsController extends Controller
{
    use SettingsTrait;
    public function index(){
        return view('admin.settings.aboutUs.index'); 
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'banner_one' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'banner_two' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
            'banner_three' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        // Upload images
        $imagePath = $this->uploadImage($request, 'image', 'assets/images/about');
        $headerImagePath = $this->uploadImage($request, 'header_image', 'assets/images/about');
        $bannerOnePath = $this->uploadImage($request, 'banner_one', 'assets/images/about');
        $bannerTwoPath = $this->uploadImage($request, 'banner_two', 'assets/images/about');
        $bannerThreePath = $this->uploadImage($request, 'banner_three', 'assets/images/about');
        // Check if the images were uploaded successfully
        if ($imagePath) {
            $validated['image'] = $imagePath;
        }
        if ($headerImagePath) {
            $validated['header_image'] = $headerImagePath;
        }
        if ($bannerOnePath) {
            $validated['banner_one'] = $bannerOnePath;
        }
        if ($bannerTwoPath) {
            $validated['banner_two'] = $bannerTwoPath;
        }
        if ($bannerThreePath) {
            $validated['banner_three'] = $bannerThreePath;
        }
        // Check if the image was uploaded successfully

        // Create a new "About" record
        About::create(array_merge($validated, [
            'image' => $imagePath,
            'header_image' => $headerImagePath,
            'banner_one' => $bannerOnePath,
            'banner_two' => $bannerTwoPath,
            'banner_three' => $bannerThreePath,
        ]));

        // Redirect with a success message
        return redirect()->back()->with('successAboutus', 'About us created successfully.');
    }

private function uploadImage(Request $request, string $fieldName, string $destinationPath)
{
    if ($request->hasFile($fieldName)) {
        $image = $request->file($fieldName);
        $imageName = time() . '_' . $fieldName . '.' . $image->extension();
        $image->move(public_path($destinationPath), $imageName);
        return $destinationPath . '/' . $imageName;
    }
    return null;
}


    public function update(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',
            'header_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',
            'banner_one' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',
            'banner_two' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',
            'banner_three' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:9048',
        ]);
        $aboutUs = About::findOrFail($id);
       
        $this->handleUpdateAboutUsImage($request, $aboutUs);
        $aboutUs->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
        ]);
 
        return redirect()->back()->with([
            'success' => 'About us updated successfully.',
        ]);
    } 

    public function governanceBoard(){
        return view('admin.aboutUs.governanceBoard.index');
    }

    public function governanceBoardStore(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/governanceBoard/'), $imageName);
        }
        
        GovernanceBoard::create(array_merge($validated, ['image' => 'assets/images/governanceBoard/'.$imageName]));
    
        return redirect()->back()->with('success', 'GovernanceBoard created successfully.');
    }

    public function governanceBoardUpdate(Request $request, $id)
    { 
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required', 
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:32768', 
        ]);
    
        $blog = GovernanceBoard::findOrFail($id);   
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('assets/images/governanceBoard/'), $imageName);
            
            $blog->update(['image' =>  'assets/images/governanceBoard/' . $imageName]);
        } 
       
        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
    
        return redirect()->route('admin.governanceBoard')->with('success', 'Governance Board successfully.');
    }

}
