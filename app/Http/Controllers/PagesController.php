<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Zleć Serwis';
        return view('pages.index')->with($title);
    }
    public function about() {
        $title = 'About Us';
        return view('pages.about')->with($title);
    }

}
