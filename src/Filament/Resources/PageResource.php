<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Hup234design\FilamentCms\Facades\FilamentCms;
use Hup234design\FilamentCms\Filament\Resources\PageResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\PageResource\RelationManagers;
use Hup234design\FilamentCms\Models\Page;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationGroup = 'Page Management';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema(
                        FilamentCms::globalFormFields(Page::class, false)
                    )
                    ->columnSpan(['lg' => 3]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Toggle::make('home')
                                    ->label('Home page.')
                                    ->default(false)
                                    ->lazy()
                                    ->afterStateUpdated(fn ($state, callable $set) => $state ? $set('visible', true) : null),
                                Forms\Components\Toggle::make('visible')
                                    ->label('Visible.')
                                    ->default(true),
                            ]),
                        FilamentCms::seoFormFields()
                    ])
                    ->columnSpan(['lg' => 1])
            ])
            ->columns(4);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('slug'),
                Tables\Columns\IconColumn::make('home')
                    ->boolean(),
                Tables\Columns\IconColumn::make('visible')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'view' => Pages\ViewPage::route('/{record}'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
