<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // index function for Home page
    public function index() {
        return view("pages.index");
    }

    // index function for About page
    public function about() {
        return view("pages.about");
    }

    // index function for Services page
    public function services() {
        return view("pages.services");
    }
}
