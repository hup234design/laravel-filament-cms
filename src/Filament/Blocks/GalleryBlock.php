<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
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
            //
        ];
    }

    public function render(): View
    {
        return view('filament-cms::livewire.blocks.gallery-block');
    }
}