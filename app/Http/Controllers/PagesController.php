<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // index function for Home page
    public function index() {
        $title = "Welcome to LBlog application";
        return view("pages.index", ['title' => $title]);
    }

    // index function for About page
    public function about() {
        $title = "About Us";
        return view("pages.about",  ['title' => $title]);
    }

    // index function for Services page
    public function services() {
        $data = [
            "title" => "Services",
            "services" => [
                "Programming",
                "Maths",
                "English Language",
                "Data Science"
            ]
        ];
        return view("pages.services", $data);
    }
}
