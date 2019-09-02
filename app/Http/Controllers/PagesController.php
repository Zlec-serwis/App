<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $title = 'Zleć Serwis';
        return view('pages.index')->with('title', $title);
    }
    public function about() {
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }
   public function services() {
        $data = array(
            'title' => 'Kategorie',
            'services' => ['Budownictwo', 'Ogród', 'Mechanika samochodowa'],
        );
        return view('pages.services')->with($data);
    }
}
