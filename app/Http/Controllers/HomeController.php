<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\HomePage;

class HomeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        $data = HomePage::first();

        return view('home', compact(['grades', 'data']));
    }
}
