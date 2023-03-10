<?php

namespace Hup234design\FilamentCms\Filament\Resources\ServiceResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\ServiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Hup234design\FilamentCms\Concerns\HandleMediables;

class EditService extends EditRecord
{
    use HandleMediables;

    protected static string $resource = ServiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
