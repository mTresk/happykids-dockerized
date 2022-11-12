<?php

namespace App\Filament\Pages;

use App\Models\HomePage;
use App\Models\Section;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Forms;

class Sections extends Page implements Forms\Contracts\HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-music-note';
    protected static string $view = 'filament.pages.sections';
    protected static ?string $title = 'Настройки секций';
    protected static ?string $navigationLabel = 'Секции';
    protected static ?string $slug = 'sections';
    protected static ?int $navigationSort = 4;

    use Forms\Concerns\InteractsWithForms;


    public function mount(): void
    {
        $sections = \App\Models\Section::first();
        $this->form->fill([
            'page_title' => $sections->title,
            'description' => $sections->description,
            'sections_list' => $sections->sections_list,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make()
                ->schema([
                    SpatieMediaLibraryFileUpload::make('image')
                        ->image()
                        ->label('Изображение')
                        ->imagePreviewHeight('350')
                        ->loadingIndicatorPosition('left')
                        ->panelLayout('integrated')
                        ->removeUploadedFileButtonPosition('right')
                        ->uploadButtonPosition('left')
                        ->uploadProgressIndicatorPosition('left')
                        ->panelLayout('grid'),
                    TextInput::make('page_title')
                        ->label('Заголовок'),
                    TextInput::make('description')
                        ->label('Описание'),
                    RichEditor::make('sections_list')
                        ->label('Список секций')
                ])->columns(1),
        ];
    }

    protected function getFormModel(): Section
    {
        return Section::first();
    }

    public function create(): void
    {
        $sections = Section::first();
        $sections->update($this->form->getState());
        $this->form->model($sections)->saveRelationships();
        $this->notify('success', 'Сохранено');
    }
}
