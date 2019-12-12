<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class WorkBoardController extends Controller
{
    /**
     * Show dashboard for login user
     */
    public function index()
    {
        $user = auth()->user();
        $doer = $user->doerRelation;
        if($doer === null)
            abort(403, 'You are not allowed to see this page');

        $post = Post::whereHas('categories', function($categories) use($doer) {
            $categories->whereIn('id', $doer->categories->pluck('id')->toArray());
        })->where('user_id', '!=', $user->id)->latest()->get();

        return view('workboard.index')->with('posts', $post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
