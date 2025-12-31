<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Project Details')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Featured Project')
                            ->default(false),
                        Forms\Components\TextInput::make('order')
                            ->numeric()
                            ->default(0)
                            ->label('Display Order'),
                    ])->columns(2),

                Forms\Components\Section::make('Images')
                    ->schema([
                        Forms\Components\FileUpload::make('featured_image')
                    ->image()
                    ->directory('projects')
                    ->imageEditor()
                    ->maxSize(5120) // 5MB max
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                    ->required(),

                Forms\Components\FileUpload::make('gallery')
                    ->image()
                    ->multiple()
                    ->directory('projects/gallery')
                    ->imageEditor()
                    ->maxSize(5120) // 5MB per file
                    ->maxFiles(10) // Max 10 gambar
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                    ->reorderable()
                    ->columnSpanFull(),
                                    ]),

                Forms\Components\Section::make('Technical Details')
                    ->schema([
                        Forms\Components\TagsInput::make('tech_stack')
                            ->placeholder('e.g., Laravel, React, MySQL')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('live_url')
                            ->url()
                            ->placeholder('https://example.com'),
                        Forms\Components\TextInput::make('github_url')
                            ->url()
                            ->placeholder('https://github.com/user/repo'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_featured')
                    ->label('Featured Projects'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->reorderable('order');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}