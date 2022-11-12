<?php

namespace App\Http\Responses;

use Filament\Facades\Filament;
use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Redirector;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request): RedirectResponse|Redirector
    {
        if (!Auth::user()->isEditor()) {
            return redirect()->intended();
        }
        return redirect()->intended(Filament::getUrl());
    }
}
