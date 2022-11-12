<?php

namespace App\Http\Controllers;

use App\Models\Section;

class SectionController extends Controller
{
    public function index(Section $section)
    {
        $section = $section->first();

        return view('sections', compact('section'));
    }
}
