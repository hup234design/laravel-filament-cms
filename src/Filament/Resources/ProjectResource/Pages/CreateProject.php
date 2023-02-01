<?php

namespace Hup234design\FilamentCms\Filament\Resources\ProjectResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\ProjectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Hup234design\FilamentCms\Traits\HandleMediables;

class CreateProject extends CreateRecord
{
    use HandleMediables;

    protected static string $resource = ProjectResource::class;
}
