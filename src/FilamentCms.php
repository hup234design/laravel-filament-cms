<?php

namespace Hup234design\FilamentCms;

use Filament\Forms;
use Hup234design\FilamentCms\Filament\Blocks\ButtonsBlock;
use Hup234design\FilamentCms\Filament\Blocks\CallToActionBlock;
use Hup234design\FilamentCms\Filament\Blocks\EventBlock;
use Hup234design\FilamentCms\Filament\Blocks\GalleryBlock;
use Hup234design\FilamentCms\Filament\Blocks\HeroBlock;
use Hup234design\FilamentCms\Filament\Blocks\ImageBlock;
use Hup234design\FilamentCms\Filament\Blocks\ProjectBlock;
use Hup234design\FilamentCms\Filament\Blocks\RichEditorBlock;
use Hup234design\FilamentCms\Filament\Blocks\TestimonialBlock;
use Hup234design\FilamentCms\Filament\Components\MediaPicker;
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

            Forms\Components\Section::make('Header Image')
                ->schema([
                    MediaPicker::make('header_image_id')
                        ->label(false)
                        ->variant('banner')
                        ->nullable()
                ])
                ->collapsible(),

            Forms\Components\Section::make('Featured Image')
                ->schema([
                    MediaPicker::make('featured_image_id')
                        ->label(false)
                        ->variant('featured')
                        ->nullable()
                ])
                ->collapsible(),

            Forms\Components\Section::make('Header Blocks')
                ->schema([
                    FilamentCms::headerBlocks(),
                ])
                ->collapsible()
                ->collapsed(false),

            Forms\Components\Section::make('Content')
                ->schema([
                    Forms\Components\RichEditor::make('content')
                        ->label(false)
                        ->nullable()
                        ->columnSpan(2),
                ])
                ->collapsible()
                ->collapsed(false),

            Forms\Components\Section::make('Content Blocks')
                ->schema([
                    FilamentCms::contentBlocks(),
                ])
                ->collapsible()
                ->collapsed(false),
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

    public function headerBlocks()
    {
        $availableBlocks = array_merge(
            [
                HeroBlock::class,
            ],
            config('filament-cms.custom_blocks.header')
        );

        $blocks = [];

        foreach ($availableBlocks as $block) {
            $blocks[] = Forms\Components\Builder\Block::make($block::name())
                ->label($block::title())
                ->schema(array_merge(
                    [
                        Forms\Components\TextInput::make('heading')->nullable()
                    ],
                    $block::schema()
                ));
        }

        return Forms\Components\Builder::make('header_blocks')
            ->disableLabel()
            ->blocks($blocks);
    }

    public function contentBlocks()
    {
        $availableBlocks = array_merge(
            [
                RichEditorBlock::class,
                ImageBlock::class,
                TestimonialBlock::class,
                ButtonsBlock::class,
                CallToActionBlock::class,
                //EventBlock::class,
                //ProjectBlock::class,
                GalleryBlock::class,
            ],
            config('filament-cms.custom_blocks.content')
        );

        $blocks = [];

        foreach ($availableBlocks as $block) {
            $blocks[] = Forms\Components\Builder\Block::make($block::name())
                ->label($block::title())
                ->schema(array_merge(
                    [
                        Forms\Components\TextInput::make('heading')->nullable(),
                        Forms\Components\Toggle::make('display_heading')->default(true),
                    ],
                    $block::schema()
                ));
        }

        return Forms\Components\Builder::make('content_blocks')
            ->disableLabel()
            ->blocks($blocks)
            ->collapsible();;
    }
}
