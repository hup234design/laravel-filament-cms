<?php

namespace Hup234design\FilamentCms\Filament\Resources\GalleryResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryImagesRelationManager extends RelationManager
{
    protected static string $relationship = 'gallery_images';

    protected static ?string $recordTitleAttribute = 'id';

    protected $listeners = [
        'galleryUpdated' => '$refresh'
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('description')
                    ->nullable()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'undo',
                    ]),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('thumbnail_url')->size(160),
                Tables\Columns\ViewColumn::make('text')
                    ->label('Title & Description')
                    ->view('filament-cms::filament.tables.columns.gallery-image-title-description'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    protected function getTableReorderColumn(): ?string
    {
        return 'sort_order';
    }

//    protected function getTableContentGrid(): ?array
//    {
//        return [
//            'sm' => 2,
//            'md' => 3,
//            'lg' => 4,
//            'xl' => 5,
//        ];
//    }
}
