<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
use Illuminate\View\View;
use Livewire\Component;

class ImageBlock extends ContentBlock implements ContentBlockTemplate
{
    public static function name(): string
    {
        return 'image-block';
    }

    public static function title(): string
    {
        return 'Image Block';
    }

    public static function schema(): array
    {
        return [
            Forms\Components\FileUpload::make('image')
                ->image()
                ->nullable()
        ];
    }

    public function render(): View
    {
        return view('filament-cms::livewire.blocks.image-block');
    }
}
