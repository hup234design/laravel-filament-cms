<?php

namespace Hup234design\FilamentCms\Filament\Resources\PageResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\PageResource;
use Filament\Resources\Pages\CreateRecord;
use Hup234design\FilamentCms\Traits\HandleMediables;

class CreatePage extends CreateRecord
{
    use HandleMediables;

    protected static string $resource = PageResource::class;
}
