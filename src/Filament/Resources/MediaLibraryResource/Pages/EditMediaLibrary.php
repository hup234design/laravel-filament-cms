<?php

namespace Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Image;

class EditMediaLibrary extends EditRecord
{
    protected static string $resource = MediaLibraryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        ray($data);

        $record->update($data);

        ray( $record );

        foreach( config('filament-cms.media.variants') as $variant=>$settings )
        {
            if( isset($record->crop_data[$variant])) {
                $originalImage = Image::load($record->getAbsolutePath());
                $variantImage = $record->findVariant($variant);
                $filename = $variantImage->getAbsolutePath();

                ray($filename);

                $originalImage->manualCrop(
                    $record->crop_data[$variant]['width'],
                    $record->crop_data[$variant]['height'],
                    $record->crop_data[$variant]['x'],
                    $record->crop_data[$variant]['y']
                )
                    ->width($settings['width'])
                    ->optimize()
                    ->save($filename);

                $variantImage->update(['size' => filesize($filename)]);
            }
        }

        return $record;
    }
}
