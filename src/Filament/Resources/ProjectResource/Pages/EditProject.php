<?php

namespace Hup234design\FilamentCms\Filament\Resources\ProjectResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\ProjectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Hup234design\FilamentCms\Traits\HandleMediables;

class EditProject extends EditRecord
{
    use HandleMediables;

    protected static string $resource = ProjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
