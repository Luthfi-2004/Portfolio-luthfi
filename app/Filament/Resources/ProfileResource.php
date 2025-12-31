<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    protected static ?string $navigationLabel = 'Profile';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tagline')
                            ->required()
                            ->placeholder('e.g., Full Stack Developer')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('bio')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Media')
                    ->schema([
                        Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->directory('profile')
                    ->imageEditor()
                    ->maxSize(5120) // 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                    ->avatar() // This makes it circular in admin
                    ->columnSpanFull(),
                        Forms\Components\FileUpload::make('resume_file')
                            ->acceptedFileTypes(['application/pdf'])
                            ->directory('resume')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Social Links')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('github')
                            ->url()
                            ->placeholder('https://github.com/username')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('linkedin')
                            ->url()
                            ->placeholder('https://linkedin.com/in/username')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('instagram')
                            ->url()
                            ->placeholder('https://instagram.com/username')
                            ->maxLength(255),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tagline')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageProfiles::route('/'),
        ];
    }
}