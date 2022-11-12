<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\Page;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $modelLabel = 'пользователя';
    protected static ?string $pluralModelLabel = 'Пользователи';
    protected static ?int $navigationSort = 11;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    FileUpload::make('avatar')
                        ->avatar()
                        ->label('Аватар'),
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->label('Имя'),
                    TextInput::make('email')
                        ->email()
                        ->required()
                        ->maxLength(255)
                        ->label('Email'),
                    DatePicker::make('email_verified_at')
                        ->label('Email подтвержден'),
                    TextInput::make('password')
                        ->password()
                        ->maxLength(255)
                        ->dehydrateStateUsing(static fn(null|string $state): null|string => filled($state) ? Hash::make($state) : null)
                        ->required(static fn(Page $livewire) => $livewire instanceof Pages\CreateUser)
                        ->dehydrated(static fn(null|string $state): bool => filled($state))
                        ->label(static fn(Page $livewire) => ($livewire instanceof Pages\EditUser) ? 'Новый пароль' : 'Пароль'),
                    Toggle::make('is_admin')
                        ->required()
                        ->label('Администратор'),
                    Toggle::make('is_editor')
                        ->required()
                        ->label('Редактор'),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')
                    ->label('Аватар')
                    ->rounded(),
                Tables\Columns\TextColumn::make('name')->label('Имя'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\BooleanColumn::make('is_admin')->label('Администратор'),
                Tables\Columns\BooleanColumn::make('is_editor')->label('Редактор'),
                Tables\Columns\BooleanColumn::make('email_verified_at')->label('Подтвержден'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    protected static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->isAdmin();
    }

    public function mount(): void
    {
        abort_unless(auth()->user()->isAdmin(), 403);
    }
}
