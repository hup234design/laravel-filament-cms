<?php

namespace Hup234design\FilamentCms\Filament\Resources\SectionCategoryResource\RelationManagers;

use Filament\Tables;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Hup234design\FilamentCms\Concerns\HandleMediables;
use Hup234design\FilamentCms\Filament\Components\MediaPicker;
use Hup234design\FilamentCms\FilamentCms;
use Hup234design\FilamentCms\Models\MediaLibrary;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectionsRelationManager extends RelationManager
{
    protected static string $relationship = 'sections';

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('content')
                    ->required(),
                Forms\Components\Section::make('Featured Image')
                    ->schema([
                        MediaPicker::make('featured_image_id')
                            ->label(false)
                            ->variant('featured')
                            ->nullable()
                    ])
                    ->collapsible(),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
