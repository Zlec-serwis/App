<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Offer;

class DashboardController extends Controller
{

    /**
     * Show dashboard for login user
     */
    public function index()
    {
        $id = auth()->user()->id;
        $posts = Post::latest()
            ->where('user_id', $id)
            ->where('active', '=', 1)
            ->get();

        $accepted = Offer::latest()
            ->where('user_id', $id)
            ->where('accepted', '=', 1)
            ->get();

        return view('dashboard.index', compact('posts', 'accepted'));
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
