<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
use Illuminate\View\View;
use Livewire\Component;

class RichEditorBlock extends ContentBlock implements ContentBlockTemplate
{
    public static function name(): string
    {
        return 'rich-editor-block';
    }

    public static function title(): string
    {
        return 'Rich Editor Block';
    }

    public static function schema(): array
    {
        return [
            Forms\Components\RichEditor::make('content')
                ->required()
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
        return view('filament-cms::filament.blocks.rich-editor-block');
    }
}
