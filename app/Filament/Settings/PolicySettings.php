<?php

namespace App\Filament\Settings;

use Spatie\LaravelSettings\Settings;

class PolicySettings extends Settings
{
    public string $title;
    public string $text;


    public static function group(): string
    {
        return 'policy';
    }
}
