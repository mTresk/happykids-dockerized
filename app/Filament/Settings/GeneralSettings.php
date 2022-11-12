<?php

namespace App\Filament\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $title;
    public string $site_name;
    public string $site_description;
    public string $phone;
    public string $whatsapp;
    public string $telegram;
    public string $vk;
    public string $address;
    public string $email;
    public string $inn;
    public string $schedule;
    public string $og_image;

    public static function group(): string
    {
        return 'general';
    }
}
