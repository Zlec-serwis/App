<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Doer;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request){

        $this->validate($request, [
           'body' => 'required|min:10',
        ]);

        $doer = Doer::findOrFail($request->doer_id);

        $user = User::findOrFail($request->user_id);

        Comment::create([
            'body' => request('body'),
            'user_id' => $user->id,
            'doer_id' => $doer->id
        ]);

        return back();
    }
}
