<?php

namespace App\Http\Controllers;

use App\Models\Grade;

class GradeController extends Controller
{
    public function show($slug, Grade $grade)
    {
        $grade = $grade->where('slug', $slug)->firstOrFail();

        return view('grade', compact('grade'));
    }
}

