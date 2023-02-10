<?php

namespace Hup234design\FilamentCms\Filament\Resources\SectionCategoryResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\SectionCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSectionCategory extends EditRecord
{
    protected static string $resource = SectionCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
