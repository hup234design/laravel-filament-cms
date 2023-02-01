<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Hup234design\FilamentCms\Facades\FilamentCms;
use Hup234design\FilamentCms\Filament\Resources\ServiceResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\ServiceResource\RelationManagers;
use Hup234design\FilamentCms\Models\Service;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Hup234design\FilamentCms\Settings\CmsSettings;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static function shouldRegisterNavigation(): bool
    {
        return app(CmsSettings::class)->services_enabled;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema(
                        FilamentCms::globalFormFields(Service::class, true)
                    )
                    ->columnSpan(['lg' => 3]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\Toggle::make('visible')
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
                Tables\Columns\IconColumn::make('visible')
                    ->boolean(),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
