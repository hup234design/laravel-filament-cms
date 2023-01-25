<?php

namespace Hup234design\FilamentCms\Filament\Resources\EventResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\EventResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
