<?php

namespace Hup234design\FilamentCms\Filament\Resources\GalleryResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\GalleryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGalleries extends ListRecords
{
    protected static string $resource = GalleryResource::class;

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
