<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
use Hup234design\FilamentCms\Models\Page;
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
            Forms\Components\Textarea::make('text'),
            Forms\Components\Repeater::make('links')
                ->schema([
                    Forms\Components\TextInput::make('label')->required(),
                    Forms\Components\Select::make('slug')
                        ->label('Page')
                        ->options(Page::all()->pluck('title', 'slug'))
                ])
                ->columns(2)
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
        return view('filament-cms::filament.blocks.hero-block');
    }
}
