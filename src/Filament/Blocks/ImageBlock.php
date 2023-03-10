<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
use Hup234design\FilamentCms\Filament\Components\MediaPicker;
use Hup234design\FilamentCms\Models\MediaLibrary;
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
            MediaPicker::make('image_id')
                ->label(false)
                ->variant('featured')
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
        return view('filament-cms::filament.blocks.image-block', [
            'media' => MediaLibrary::find($this->data['image_id'] ?? null)
        ]);
    }
}
