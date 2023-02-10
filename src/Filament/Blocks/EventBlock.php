<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
use Illuminate\View\View;

class EventBlock extends ContentBlock implements ContentBlockTemplate
{
    public static function name(): string
    {
        return 'event-block';
    }

    public static function title(): string
    {
        return 'Event Block';
    }

    public static function schema(): array
    {
        return [
            //
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
        return view('filament-cms::filament.blocks.event-block');
    }
}
