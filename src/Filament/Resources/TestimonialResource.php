<?php

namespace Hup234design\FilamentCms\Filament\Resources;

use Carbon\Carbon;
use Hup234design\FilamentCms\Filament\Resources\TestimonialResource\Pages;
use Hup234design\FilamentCms\Filament\Resources\TestimonialResource\RelationManagers;
use Hup234design\FilamentCms\Models\Testimonial;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')->required(),
                        Forms\Components\TextInput::make('location')->nullable(),
                        Forms\Components\TextInput::make('company')->nullable(),
                        Forms\Components\TextInput::make('job_title')->nullable(),
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\DatePicker::make('received_at')
                            ->label('Received At')
                            ->default(Carbon::now())
                            ->required(),
                        Forms\Components\Textarea::make('content')->required(),
                        Forms\Components\Toggle::make('visible')
                            ->default(true),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('location'),
                Tables\Columns\TextColumn::make('company'),
                Tables\Columns\TextColumn::make('job_title'),
                Tables\Columns\TextColumn::make('received_at')->date(),
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
            'index' => Pages\ListTestimonials::route('/'),
        ];
    }
}
