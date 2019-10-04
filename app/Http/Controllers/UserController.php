<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
class UserController extends Controller
{
    public function profile(){
        return view('profile', array('user'=> Auth::user()) );
    }
    public function update_avatar(Request $request) {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return view('profile', array('user'=> Auth::user()) );
    }

    /**
     * list of doers
     */
    public function users()
    {
        $title = 'Wykonawcy';
        $doers = User::where('doer', 1)->latest()->get();
        return view('doer.users', compact('title', 'doers'));
    }

    /*
     *show doer
     */

    public function show($id)
    {
        $doer = User::find($id);
        return $doer;
    }

    /**	
     * update profile	
     */
    public function doer_profile(Request $request)
    {
        $user = Auth::user();
        $user->update($request->all());
        $user->save();

        return view('doer.doer', array('user' => Auth::user()));
    }


}
