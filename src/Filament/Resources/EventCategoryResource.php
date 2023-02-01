<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Hup234design\FilamentCms\Facades\FilamentCms;
use Hup234design\FilamentCms\Filament\Resources\EventCategoryResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\EventCategoryResource\RelationManagers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Hup234design\FilamentCms\Models\EventCategory;
use Hup234design\FilamentCms\Settings\CmsSettings;
use Illuminate\Support\Str;

class EventCategoryResource extends Resource
{
    protected static ?string $model = EventCategory::class;

    protected static ?string $navigationGroup = 'Event Management';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static function shouldRegisterNavigation(): bool
    {
        return app(CmsSettings::class)->events_enabled;
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
                    ->unique(EventCategory::class, 'slug', ignoreRecord: true),

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
            'index' => Pages\ListEventCategories::route('/'),
        ];
    }
}
