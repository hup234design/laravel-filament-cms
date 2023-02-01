<?php

namespace Hup234design\FilamentCms\Filament\Resources\ServiceResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\ServiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Hup234design\FilamentCms\Traits\HandleMediables;

class CreateService extends CreateRecord
{
    use HandleMediables;

    protected static string $resource = ServiceResource::class;
}
