<?php

namespace Hup234design\FilamentCms;

use Filament\Forms;
use Illuminate\Support\Str;

class FilamentCms
{
    public function globalFormFields($model, $summary=false)
    {
        return [

            Forms\Components\Card::make()
                ->schema([

                    Forms\Components\TextInput::make('title')
                        ->required()
                        ->lazy()
                        ->afterStateUpdated(fn (string $context, $state, callable $set) => $context === 'create' ? $set('slug', Str::slug($state)) : null),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->lazy()
                        ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)) )
                        ->unique($model, 'slug', ignoreRecord: true),

                    Forms\Components\Textarea::make('summary')
                        ->nullable()
                        ->columnSpan(2)
                        ->hidden( ! $summary ),

//                    Forms\Components\FileUpload::make('header_image')
//                        ->image()
//                        ->nullable()
//                        ->columnSpan(2),
//
//                    Forms\Components\FileUpload::make('featured_image')
//                        ->image()
//                        ->nullable()
//                        ->columnSpan(2),
                ]),

            Forms\Components\section::make('Content')
                ->schema([
                    Forms\Components\RichEditor::make('content')
                        ->label(false)
                        ->nullable()
                        ->columnSpan(2),
                ])
                ->collapsible(),
        ];
    }

    public function seoFormFields()
    {
        return Forms\Components\Section::make('SEO')
            ->collapsible(true)
            ->schema([
                Forms\Components\TextInput::make('seo_title')
                    ->label('SEO Title')
                    ->nullable(),
                Forms\Components\Textarea::make('seo_description')
                    ->label('SEO Description')
                    ->nullable(),
            ])
            ->collapsed(false);
    }
}
