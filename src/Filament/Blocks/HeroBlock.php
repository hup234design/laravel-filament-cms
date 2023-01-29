<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
use Illuminate\View\View;

class HeroBlock extends ContentBlock implements ContentBlockTemplate
{
    public static function name(): string
    {
        return 'hero-block';
    }

    public static function title(): string
    {
        return 'Hero Block';
    }

    public static function schema(): array
    {
        return [
            Forms\Components\FileUpload::make('image')
                ->image()
        ];
    }

    public function render(): View
    {
        return view('filament-cms::livewire.blocks.hero-block');
    }
}
