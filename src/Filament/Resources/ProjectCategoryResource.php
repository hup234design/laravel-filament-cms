<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Hup234design\FilamentCms\Facades\FilamentCms;
use Hup234design\FilamentCms\Filament\Resources\ProjectCategoryResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\ProjectCategoryResource\RelationManagers;
use Hup234design\FilamentCms\Models\PostCategory;
use Hup234design\FilamentCms\Models\ProjectCategory;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Hup234design\FilamentCms\Settings\CmsSettings;
use Illuminate\Support\Str;

class ProjectCategoryResource extends Resource
{
    protected static ?string $model = ProjectCategory::class;

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static function shouldRegisterNavigation(): bool
    {
        return app(CmsSettings::class)->projects_enabled;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->lazy()
                    ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->lazy()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)) )
                    ->unique(PostCategory::class, 'slug', ignoreRecord: true),

                Forms\Components\Textarea::make('summary')
                    ->nullable()
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('slug'),
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
            'index' => Pages\ListProjectCategories::route('/'),
        ];
    }
}
