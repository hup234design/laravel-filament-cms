<?php

namespace Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMediaLibrary extends EditRecord
{
    protected static string $resource = MediaLibraryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
