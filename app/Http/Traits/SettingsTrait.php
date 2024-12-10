<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;

trait SettingsTrait
{
  

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

   

    private function handleUpdateAboutUsImage(Request $request, $aboutUs)
    {
        $updates = [];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_image.' . $image->extension();
            $image->move(public_path('assets/images/about'), $imageName);

            // Delete the old image if it exists
            if (!empty($aboutUs->image) && file_exists(public_path($aboutUs->image))) {
                unlink(public_path($aboutUs->image));
            }

            $updates['image'] = 'assets/images/about/' . $imageName;
        }

        if ($request->hasFile('header_image')) {
            $headerImage = $request->file('header_image');
            $headerImageName = time() . '_header.' . $headerImage->extension();
            $headerImage->move(public_path('assets/images/about'), $headerImageName);

            // Delete the old header image if it exists
            if (!empty($aboutUs->header_image) && file_exists(public_path($aboutUs->header_image))) {
                unlink(public_path($aboutUs->header_image));
            }

            $updates['header_image'] = 'assets/images/about/' . $headerImageName;
        }

        if (!empty($updates)) {
            $aboutUs->update($updates);
        }
    }

    public function uploadImageExecutiveSummary($request, $fieldName, $destinationPath)
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path($destinationPath), $imageName);
            return $destinationPath . '/' . $imageName;
        }
        return null;
    }
    public function handleUpdateExecutiveSummaryImage($request, $executiveSummary){
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('executiveSummaryImage'), $imageName);
            if ($executiveSummary->image) {
                unlink(public_path($executiveSummary->image));
            }
            $executiveSummary->image = 'executiveSummaryImage/' . $imageName;
            $executiveSummary->save();
        }
        
    }
}