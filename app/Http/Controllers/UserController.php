<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function profileUpdate(Request $request){
        if (Auth::user() != null) {

            $user = Auth::user();
            if ($user->profile_image != "") {
                $profile_image = str_replace('../users/profile_img/', '', $user->profile_image);
                $profile_image = public_path('users/profile_img/').$profile_image;
                if (file_exists($profile_image)) {
                    unlink($profile_image);
                }
            }
    
            if ($request->hasFile('profileImage') && $request->file('profileImage')->isValid()) {
                $requestImage = $request->profileImage;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName()).strtotime('now').".".$extension;
                $requestImage = Image::make($requestImage->getPathname())
                ->resize(96, 96)
                ->encode('jpg', 60)
                ->save(public_path('users/profile_img') . '/' . $imageName);
                //$requestImage->save(public_path('users/profile_img') . '/' . $imageName);
                $user->profile_image = '../users/profile_img/'.$imageName;
            }
            $user->save();
            return redirect()->back();
        }else {
            return redirect()->route('login');
        }
        
    }
}
