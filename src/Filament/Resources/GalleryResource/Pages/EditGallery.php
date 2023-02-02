<?php

namespace Hup234design\FilamentCms\Filament\Resources\GalleryResource\Pages;

use Hup234design\FilamentCms\Filament\Actions\MediaPickerAction;
use Hup234design\FilamentCms\Filament\Resources\GalleryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGallery extends EditRecord
{
    protected static string $resource = GalleryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()
        ];
    }

}
