<?php

namespace Hup234design\FilamentCms\Filament\Resources\ProjectResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\ProjectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProject extends EditRecord
{
    protected static string $resource = ProjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
