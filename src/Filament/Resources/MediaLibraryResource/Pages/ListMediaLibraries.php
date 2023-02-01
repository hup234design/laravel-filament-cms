<?php

namespace Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListMediaLibraries extends ListRecords
{
    protected static string $resource = MediaLibraryResource::class;

    protected function getTableQuery(): Builder
    {
        return parent::getTableQuery()->originals();
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }



    protected function getTableContentGrid(): ?array
    {
        return [
            'sm' => 2,
            'md' => 3,
            'lg' => 4,
            'xl' => 5,
        ];
    }
}
