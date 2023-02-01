<?php

namespace Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\MediaLibraryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\Facades\MediaUploader;

class CreateMediaLibrary extends CreateRecord
{
    protected static string $resource = MediaLibraryResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        foreach( $data['images'] as $filename )
        {
            $original_filename = pathinfo(trim($data['original_filenames'][$filename]), PATHINFO_FILENAME );
            $alt = Str::headline($original_filename);

            $media = MediaUploader::importPath('public', $filename);
            $media->update([
                'original_filename' => $original_filename,
                'alt' => $alt,
            ]);

            $crop_data = [];

            foreach( config('filament-cms.media.variants') as $variant=>$settings)
            {
                $mediaVariant = ImageManipulator::createImageVariant($media, $variant);
                $mediaVariant->update([
                    'original_filename' => $original_filename,
                    'alt' => $alt,
                ]);

                $crop_data[$variant] = [
                    'x' => 0,
                    'y' => 0,
                    'width' => 0,
                    'height' => 0,
                ];
            }

            $media->update(['crop_data' => $crop_data]);
        }

        return $media;
    }
}
