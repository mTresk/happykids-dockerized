<?php

namespace App\Providers;

use App\Filament\Resources\UserResource;
use App\Filament\Settings\GeneralSettings;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use JeffGreco13\FilamentBreezy\Pages\MyProfile;
use Spatie\LaravelSettings\Settings;
use Filament\Http\Responses\Auth\Contracts\LoginResponse as LoginResponseContract;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $settings = app(GeneralSettings::class);

            $view->with('site_name', $settings->site_name);
            $view->with('site_description', $settings->site_description);
            $view->with('phone', $settings->phone);
            $view->with('whatsapp', $settings->whatsapp);
            $view->with('telegram', $settings->telegram);
            $view->with('vk', $settings->vk);
            $view->with('address', $settings->address);
            $view->with('email', $settings->email);
            $view->with('inn', $settings->inn);
            $view->with('schedule', $settings->schedule);
            $view->with('og_image', $settings->og_image);
        });

        $this->app->bind(LoginResponseContract::class, \App\Http\Responses\LoginResponse::class);
        
        Filament::serving(function () {
            Filament::registerUserMenuItems([
                'account' => UserMenuItem::make()->url(MyProfile::getUrl()),
            ]);
        });

    }
}
