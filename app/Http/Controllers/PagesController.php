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
   public function services() {
        $data = array(
            'title' => 'Kategorie',
            'services' => ['Budownictwo', 'Ogród', 'Mechanika samochodowa'],
        );
        return view('pages.services')->with($data);
    }
    public function users() {
        $title = 'Wykonawcy';
        $doer = User::All();
        $doers = $doer->where('doer', 1);
      
        return view('pages.users', compact('title', 'doers'));
    }

}
