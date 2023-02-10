<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
use Illuminate\View\View;

class CardsBlock extends ContentBlock implements ContentBlockTemplate
{
    public static function name(): string
    {
        return 'cards-block';
    }

    public static function title(): string
    {
        return 'Cards Block';
    }

    public static function schema(): array
    {
        return [
            Forms\Components\Repeater::make('cards')
                ->disableLabel()
                ->schema([
                    Forms\Components\TextInput::make('title')
                        ->nullable(),
                    Forms\Components\RichEditor::make('content')
                        ->nullable(),
                ])
                ->collapsible()
        ];
    }

    public function render(): View
    {
        return view('filament-cms::filament.blocks.buttons-block');
    }
}
