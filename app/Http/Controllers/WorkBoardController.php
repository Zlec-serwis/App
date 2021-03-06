<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Offer;

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

        $posts = Post::whereHas('categories', function($categories) use($doer) {
            $categories->whereIn('id', $doer->categories->pluck('id')->toArray());
        })->where('address_id', '=', $doer->address_id)
            ->where('user_id', '!=', $user->id)
            ->where('active', '=', 1)
            ->latest()->get();

        $offers = Offer::where('doer_id', '=', $doer->id)
                ->where('status_id', '=', 1)
                ->latest()->get();

        $accepted = Offer::where('doer_id', '=', $doer->id)
            ->where('accepted', true)
            ->latest()->get();

        $rejected = Offer::where('doer_id', '=', $doer->i)
            ->where('accepted', false)
            ->where('status_id', '=', 2)
            ->latest()->get();
        return view('workboard.index', compact('posts', 'offers','accepted','rejected'));
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
