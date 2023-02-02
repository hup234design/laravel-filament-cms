<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\Page;
use Hup234design\FilamentCms\Facades\FilamentCms;
use Hup234design\FilamentCms\Filament\Components\MediaPicker;
use Hup234design\FilamentCms\Filament\Resources\GalleryResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\GalleryResource\RelationManagers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Hup234design\FilamentCms\Models\Gallery;
use Hup234design\FilamentCms\Models\MediaLibrary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationGroup = 'Media';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->lazy()
                    ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->lazy()
                    ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)) )
                    ->unique(Gallery::class, 'slug', ignoreRecord: true),

                Forms\Components\Textarea::make('description')
                    ->nullable()
                    ->columnSpan(2),

                MediaPicker::make('gallery_image_id')
                    ->label(false)
                    ->variant('featured')
                    ->gallery(true)
                    ->columnSpan(2)
                    ->hidden(fn (Page $livewire) => $livewire instanceof CreateRecord),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
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
            RelationManagers\GalleryImagesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'   => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit'   => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
