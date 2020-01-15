<?php

namespace App\Http\Controllers;

use App\ContanctUs;
use App\Mail\ContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Mail};
use App\Http\Controllers\Controller;

class ContanctUsController extends Controller
{
    public function contactUsPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $contact = ContanctUs::create($request->all());

        Mail::to($contact)->send(new ContactUsMail($contact));



        return back()->with('success', 'Dziękujemy za kontakt!');
    }
}

