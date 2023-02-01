<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource\RelationManagers;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class MediaLibraryResource extends Resource
{
    protected static ?string $model = \Hup234design\FilamentCms\Models\MediaLibrary::class;

    protected static ?string $navigationGroup = 'Media';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $modelLabel = 'Media Image';
    protected static ?string $pluralModelLabel = 'Media Library';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('images')
                    ->required()
                    ->multiple()
                    ->storeFileNamesIn('original_filenames')
                    ->hidden(fn (Page $livewire) => $livewire instanceof EditRecord)
                    ->columnSpan(3),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('alt'),
                        Forms\Components\Textarea::make('caption')->rows(3),
                        Forms\Components\Textarea::make('description')->rows(3),
                    ])
                    ->columnSpan(1)
                    ->hidden(fn (Page $livewire) => $livewire instanceof CreateRecord),
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\ViewField::make('crop_data')
                            ->view('filament-cms::filament.forms.components.media-cropper')
                    ])
                    ->columnSpan(2)
                    ->hidden(fn (Page $livewire) => $livewire instanceof CreateRecord)
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail_url')->label('Image')->size('100%'),
                Tables\Columns\TextColumn::make('original_filename')->label('Original Filename')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'create' => Pages\CreateMediaLibrary::route('/create'),
            'edit' => Pages\EditMediaLibrary::route('/{record}/edit'),
        ];
    }
}
