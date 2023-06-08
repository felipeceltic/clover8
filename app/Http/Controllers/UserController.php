<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profileUpdate(Request $request){
        if (Auth::user() != null) {
            $user = Auth::user();
            if ($user->profile_image != "") {
                Storage::delete($user->profile_image);
            }
    
            if ($request->hasFile('profileImage') && $request->file('profileImage')->isValid()) {
                $requestImage = $request->profileImage;
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName()).strtotime('now').".".$extension;
                $requestImage->move(public_path('users/profile_img'), $imageName);
                $user->profile_image = '../users/profile_img/'.$imageName;
            }
            $user->save();
            return redirect()->back();
        } else {
            return redirect()->route('login');
        }
        
    }
}
