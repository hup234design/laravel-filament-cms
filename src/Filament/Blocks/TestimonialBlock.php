<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
use Hup234design\FilamentCms\Models\Testimonial;
use Illuminate\View\View;
use Livewire\Component;

class TestimonialBlock extends ContentBlock implements ContentBlockTemplate
{
    public static function name(): string
    {
        return 'testimonial-block';
    }

    public static function title(): string
    {
        return 'Testimonial Block';
    }

    public static function schema(): array
    {
        return [
            Forms\Components\Select::make('testimonial_id')
                ->label('Testimonial')
                ->options(Testimonial::all()->pluck('title', 'id'))
                ->required()
        ];
    }

    public function getTestimonialProperty() {
        return Testimonial::find($this->data['testimonial_id'] ?? null);
    }

    public function render(): View
    {
        return view('filament-cms::livewire.blocks.testimonial-block', [
            'testimonial' => $this->testimonial
        ]);
    }
}
