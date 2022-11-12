<?php

namespace App\Filament\Pages;

use App\Models\HomePage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Filament\Forms;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MainPageSettings extends Page implements Forms\Contracts\HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static string $view = 'filament.pages.main-page-settings';
    protected static ?string $title = 'Настройки главной страницы';
    protected static ?string $navigationLabel = 'Главная страница';
    protected static ?string $slug = 'main-settings';
    protected static ?int $navigationSort = 2;

    use Forms\Concerns\InteractsWithForms;

    public function mount(): void
    {
        $homePage = HomePage::first();

        $this->form->fill([
            'about_title' => $homePage->about_title,
            'about_text' => $homePage->about_text,
            'recruiting' => $homePage->recruiting,
            'recruiting_full' => $homePage->recruiting_full,
            'education' => $homePage->education,
            'advantages' => $homePage->advantages,
            'we_abandoned' => $homePage->we_abandoned,
            'we_choose' => $homePage->we_choose,
            'admission' => $homePage->admission,
            'faq' => $homePage->faq,
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Section::make('О школе')
                ->schema([
                    Textarea::make('about_title')
                        ->label('Заголовок')
                        ->rows(5),
                    Textarea::make('about_text')
                        ->label('Текст')
                        ->rows(5),
                    TextInput::make('recruiting')
                        ->label('Текст на звездочке'),
                    TextInput::make('recruiting_full')
                        ->label('Текст о наборе'),
                ])->columns(2)
                ->collapsed(),

            Section::make('Мы уделяем внимание развитию')
                ->schema([
                    Repeater::make('education')
                        ->label('Пункты')
                        ->schema([
                            TextInput::make('item')
                                ->label('Пункт'),
                        ])
                        ->createItemButtonLabel('Добавить пункт')
                        ->grid()
                ])->collapsed(),

            Section::make('Преимущества')
                ->schema([
                    Repeater::make('advantages')
                        ->label('Пункты')
                        ->schema([
                            TextInput::make('item')
                                ->label('Заголовок'),
                            FileUpload::make('advantages_image')->image()
                                ->label('Иконка'),
                        ])
                        ->createItemButtonLabel('Добавить пункт')
                        ->grid()
                ])->columns(1)
                ->collapsed(),

            Section::make('Наш выбор')
                ->schema([
                    Repeater::make('we_abandoned')
                        ->label('Мы отказались от:')
                        ->schema([
                            TextInput::make('item')
                                ->label('Пункт'),
                        ])
                        ->createItemButtonLabel('Добавить пункт'),
                    Repeater::make('we_choose')
                        ->label('Мы выбираем:')
                        ->schema([
                            TextInput::make('item')
                                ->label('Пункт'),
                        ])
                        ->createItemButtonLabel('Добавить пункт')
                ])
                ->columns(2)
                ->collapsed(),

            Section::make('Этапы поступления')
                ->schema([
                    Repeater::make('admission')
                        ->label('Пункт')
                        ->schema([
                            TextInput::make('title')
                                ->label('Заголовок'),
                            Textarea::make('text')
                                ->label('Текст')
                                ->rows(4),
                        ])
                        ->createItemButtonLabel('Добавить пункт'),
                ])
                ->columns(1)
                ->collapsed(),

            Section::make('Вопрос — ответ')
                ->schema([
                    Repeater::make('faq')
                        ->label('Пункт')
                        ->schema([
                            Textarea::make('question')
                                ->label('Вопрос')
                                ->rows(2),
                            Textarea::make('answer')
                                ->label('Ответ'),
                        ])
                        ->createItemButtonLabel('Добавить пункт'),
                ])
                ->columns(1)
                ->collapsed(),
            Section::make('Галерея')
                ->schema([
                    SpatieMediaLibraryFileUpload::make('slider')
                        ->label('Фотографии')
                        ->collection('slides')
                        ->multiple()
                        ->enableReordering()
                        ->panelLayout('grid')
                        ->imagePreviewHeight('200')
                        ->loadingIndicatorPosition('left')
                        ->removeUploadedFileButtonPosition('right')
                        ->uploadButtonPosition('left')
                        ->uploadProgressIndicatorPosition('left'),
                ])
                ->collapsed(),
        ];
    }

    protected function getFormModel(): HomePage
    {
        return HomePage::first();
    }

    public function create(): void
    {
        $homePage = HomePage::first();
        $homePage->update($this->form->getState());
        $this->form->model($homePage)->saveRelationships();
        $this->notify('success', 'Сохранено');
    }
}
