<?php

namespace App\Filament\Pages;

use App\Filament\Settings\GeneralSettings;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class Settings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $title = 'Настройки сайта';
    protected static ?int $navigationSort = 1;
    protected static ?string $slug = 'settings';

    protected static string $settings = GeneralSettings::class;

    protected function getFormSchema(): array
    {
        return [
            Section::make('Основные настройки')
                ->schema([
                    TextInput::make('site_name')
                        ->required()
                        ->label('Название сайта'),
                    TextInput::make('site_description')
                        ->label('Описание сайта'),
                    TextInput::make('phone')
                        ->label('Телефон'),
                    TextInput::make('address')
                        ->label('Адрес'),
                    TextInput::make('email')
                        ->email()
                        ->label('Почта'),
                    TextInput::make('schedule')
                        ->label('Время работы'),
                    TextInput::make('inn')
                        ->label('ИНН')
                        ->columnSpan('full'),
                ])->columns(2),
            Section::make('Социальные сети')
                ->schema([
                    TextInput::make('telegram')
                        ->label('Telegram'),
                    TextInput::make('vk')
                        ->label('Вконтакте'),
                    TextInput::make('whatsapp')
                        ->label('WhatsApp'),
                ])->columns(2),
            FileUpload::make('og_image')->image()
                ->label('Изображение'),
        ];
    }
}
