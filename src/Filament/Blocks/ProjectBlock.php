<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
use Illuminate\View\View;

class ProjectBlock extends ContentBlock implements ContentBlockTemplate
{
    public static function name(): string
    {
        return 'project-block';
    }

    public static function title(): string
    {
        return 'Project Block';
    }

    public static function schema(): array
    {
        return [
            //
        ];
    }

    public function render(): View
    {
        return view('filament-cms::livewire.blocks.project-block');
    }
}
