<?php

namespace App\Http\Controllers;

use App\Filament\Settings\PolicySettings;

class PolicyController extends Controller
{
    public function index()
    {
        $policy = app(PolicySettings::class);

        return view('policy', compact('policy'));
    }
}
