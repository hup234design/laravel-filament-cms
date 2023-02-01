<?php

namespace Hup234design\FilamentCms\Filament\Resources\PostResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\PostResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Hup234design\FilamentCms\Traits\HandleMediables;

class EditPost extends EditRecord
{
    use HandleMediables;

    protected static string $resource = PostResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
