<?php

namespace Hup234design\FilamentCms\Filament\Resources\SectionCategoryResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\SectionCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSectionCategories extends ListRecords
{
    protected static string $resource = SectionCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
