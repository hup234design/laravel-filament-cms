<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Carbon\Carbon;
use Hup234design\FilamentCms\Facades\FilamentCms;
use Hup234design\FilamentCms\Filament\Resources\ProjectResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\ProjectResource\RelationManagers;
use Hup234design\FilamentCms\Models\Project;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Hup234design\FilamentCms\Models\ProjectCategory;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema(
                        FilamentCms::globalFormFields(Project::class, true)
                    )
                    ->columnSpan(['lg' => 3]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Select::make('project_category_id')
                            ->label('Category')
                            ->options(ProjectCategory::all()->pluck('name', 'id'))
                            ->nullable(),
                        Forms\Components\Card::make()
                            ->schema([
                                Forms\Components\DatePicker::make('date')
                                    ->label('Date')
                                    ->default(Carbon::now())
                                    ->required(),
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
                Tables\Columns\TextColumn::make('project_category.name')->label('Category'),
                Tables\Columns\TextColumn::make('date')->date(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
