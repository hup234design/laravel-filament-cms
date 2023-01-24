<?php

namespace Hup234design\FilamentCms\Filament\Resources\PageResource\Pages;

use Hup234design\FilamentCms\Filament\Resources\PageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Facades\ImageManipulator;
use Plank\Mediable\Facades\MediaUploader;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
//        if ( $header_image = $data['header_image'] ?? null ) {
//            $media = MediaUploader::importPath('public', $header_image);
//            $thumbnail = ImageManipulator::createImageVariant($media, 'thumbnail');
//            $record->syncMedia($media, 'header_image');
//        } else {
//            $record->detachMediaTags('header_image');
//        }

//        if ( $featured_image = $data['featured_image'] ?? null ) {
//            $media = MediaUploader::importPath('public', $featured_image);
//            $thumbnail = ImageManipulator::createImageVariant($media, 'thumbnail');
//            $record->syncMedia($media, 'featured_image');
//        } else {
//            $record->detachMediaTags('featured_image');
//        }

//        unset($data['header_image']);
//        unset($data['featured_image']);

        $record->update($data);

        return $record;
    }

}
