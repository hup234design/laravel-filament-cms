<?php

namespace Hup234design\FilamentCms\Filament\Resources\EventResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\EventResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Hup234design\FilamentCms\Concerns\HandleMediables;

class EditEvent extends EditRecord
{
    use HandleMediables;

    protected static string $resource = EventResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
