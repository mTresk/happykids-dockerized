<?php

namespace App\Filament\Pages;

use App\Filament\Settings\PolicySettings;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;

class Policy extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Политика конфиденциальности';
    protected static ?int $navigationSort = 10;

    protected static string $settings = PolicySettings::class;

    protected function getFormSchema(): array
    {
        return [
            Section::make('Информация')
                ->schema([
                    TextInput::make('title')
                        ->label('Заголовок'),
                    RichEditor::make('text')
                        ->label('Текст'),
                ])->columns(1),
        ];
    }
}
