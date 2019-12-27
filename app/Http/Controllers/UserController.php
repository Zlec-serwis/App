<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Doer;
use App\Address;
use App\Category;

use Auth;
use Image;
use phpDocumentor\Reflection\DocBlock\Description;

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
        $doers = Doer::latest()->get();
        return view('doer.users', compact('doers'));
    }

    /*
     *show doer
     */

    public function show($id)
    {
        $doer = Doer::findorFail($id);
        return view('doer.show')->with('doer', $doer);
    }

    // /**
    //  * update profile
    //  */
    // public function doer_profile(Request $request)
    // {

    //     $user = Auth::user();
    //     dd($user->description);
    //     $user->update($request->all());
    //     $user->save();

    //     return view('doer.doer', array('user' => Auth::user()));
    // }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */

    public function create_doer()
    {
        $user = Auth::user();
        $doer = new Doer;

        $categories = Category::pluck('name', 'id');
        $addresses = Address::pluck('city', 'id');

        return view('doer.create', compact('user', 'doer', 'categories', 'addresses'));
    }

    public function store_doer(Request $request)
    {
        $user = Auth::user();
        $user->doer = $request->input('doer');
        $user->save();

        $doer = new Doer;
        $doer->user_id = Auth::user()->id;
        $doer->name = $request->input('name');
        $doer->description = $request->input('make');

        $addressId = $request->input('Addresses');
        $doer->address_id = $addressId;

        $doer->save();

        $categoryId = $request->input('CategoryList');
        $doer->categories()->attach($categoryId);

        return redirect('/profile');

    }


}
