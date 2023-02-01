<?php

namespace Hup234design\FilamentCms\Filament\Resources\EventResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\EventResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Hup234design\FilamentCms\Traits\HandleMediables;

class CreateEvent extends CreateRecord
{
    use HandleMediables;

    protected static string $resource = EventResource::class;
}
