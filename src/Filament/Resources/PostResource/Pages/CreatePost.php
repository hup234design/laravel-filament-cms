<?php

namespace Hup234design\FilamentCms\Filament\Resources\PostResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\PostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Hup234design\FilamentCms\Concerns\HandleMediables;

class CreatePost extends CreateRecord
{
    use HandleMediables;

    protected static string $resource = PostResource::class;
}
