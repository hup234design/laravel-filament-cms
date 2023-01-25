<?php

namespace Hup234design\FilamentCms\Filament\Resources\ProjectCategoryResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\ProjectCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProjectCategories extends ListRecords
{
    protected static string $resource = ProjectCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getTableReorderColumn(): ?string
    {
        return 'sort_order';
    }
}
