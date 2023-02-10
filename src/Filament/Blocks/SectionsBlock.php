<?php

namespace Hup234design\FilamentCms\Filament\Blocks;

use Filament\Forms;
use Hup234design\FilamentCms\Contracts\ContentBlockTemplate;
use Hup234design\FilamentCms\Models\SectionCategory;
use Illuminate\View\View;

class SectionsBlock extends ContentBlock implements ContentBlockTemplate
{
    public static function name(): string
    {
        return 'sections-block';
    }

    public static function title(): string
    {
        return 'Sections Block';
    }

    public static function schema(): array
    {
        return [
            Forms\Components\Select::make('section_category_id')
                ->label('Section Category')
                ->options(SectionCategory::all()->pluck('name', 'id'))
                ->required()
        ];
    }

    public static function options(): array
    {
        return [
            Forms\Components\Select::make('format')
                ->label('Format')
                ->options([
                    'list' => 'List',
                    'cards' => 'Cards',
                    'gallery' => 'Gallery'
                ])
                ->default('list')
                ->required()
        ];
    }

    public function render(): View
    {
        $sectionCategory = SectionCategory::find($this->data['section_category_id']);
        return view('filament-cms::filament.blocks.sections-block', [
            'sections' => $sectionCategory ? $sectionCategory->sections : collect([])
        ]);
    }
}
