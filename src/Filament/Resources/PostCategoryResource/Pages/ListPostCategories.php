<?php

namespace Hup234design\FilamentCms\Filament\Resources\PostCategoryResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\PostCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPostCategories extends ListRecords
{
    protected static string $resource = PostCategoryResource::class;

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
