<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource\RelationManagers;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class MediaLibraryResource extends Resource
{
    protected static ?string $model = \Hup234design\FilamentCms\Models\MediaLibrary::class;

    protected static ?string $navigationGroup = 'Media';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail_url')->label('Image')->size(80),
                Tables\Columns\TextColumn::make('filename'),
                Tables\Columns\TextColumn::make('size'),
                Tables\Columns\TextColumn::make('created_at')->datetime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMediaLibraries::route('/'),
            //'create' => Pages\CreateMediaLibrary::route('/create'),
            //'edit' => Pages\EditMediaLibrary::route('/{record}/edit'),
        ];
    }
}
