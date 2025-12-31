<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;
    protected static ?string $navigationIcon = 'heroicon-o-star';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('category')
                    ->options([
                        'Frontend' => 'Frontend',
                        'Backend' => 'Backend',
                        'Database' => 'Database',
                        'Tools' => 'Tools',
                        'Other' => 'Other',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('level')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->default(50)
                    ->suffix('%'),
                Forms\Components\TextInput::make('icon')
                    ->placeholder('e.g., devicon-laravel-plain')
                    ->maxLength(255),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Frontend' => 'success',
                        'Backend' => 'warning',
                        'Database' => 'info',
                        'Tools' => 'gray',
                        default => 'primary',
                    }),
                Tables\Columns\TextColumn::make('level')
                    ->suffix('%'),
                Tables\Columns\TextColumn::make('order')
                    ->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Frontend' => 'Frontend',
                        'Backend' => 'Backend',
                        'Database' => 'Database',
                        'Tools' => 'Tools',
                        'Other' => 'Other',
                    ]),
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
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}