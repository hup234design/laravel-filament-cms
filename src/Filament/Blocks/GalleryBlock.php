<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
use Hup234design\FilamentCms\Models\Gallery;
use Illuminate\View\View;

class GalleryBlock extends ContentBlock implements ContentBlockTemplate
{
    public static function name(): string
    {
        return 'gallery-block';
    }

    public static function title(): string
    {
        return 'Gallery Block';
    }

    public static function schema(): array
    {
        return [
            Forms\Components\Select::make('gallery_id')
                ->label('Category')
                ->options(Gallery::all()->pluck('title', 'id'))
                ->nullable(),
            Forms\Components\Select::make('display_as')
                ->options([
                    'list'     => 'List',
                    'grid'     => 'Grid',
                    'carousel' => 'Carousel',
                ])
                ->required()
                ->default('grid')
        ];
    }

    public static function options(): array
    {
        return [
            //
        ];
    }

    public function render(): View
    {
        return view('filament-cms::filament.blocks.gallery-block', [
            'gallery' => Gallery::with('gallery_images')->find($this->data['gallery_id']) ?? null
        ]);
    }
}
