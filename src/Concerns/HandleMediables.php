<?php

namespace Hup234design\FilamentCms\Concerns;

use Hup234design\FilamentCms\Models\MediaLibrary;
use Illuminate\Database\Eloquent\Model;

trait HandleMediables
{
    protected function handleRecordCreation(array $data): Model
    {
        // return $this->getModel()::create($data);

        $images = [
            'header_image_id'   => $data['header_image_id']   ?? null,
            'featured_image_id' => $data['featured_image_id'] ?? null,
            'gallery_image_id'  => $data['gallery_image_id']   ?? null,
        ];
        $data = array_diff_key($data, array_flip(array_keys($images)));
        $record = $this->getModel()::create($data);

        $this->attachMedia($record, $images);
        return $record;
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        // $record->update($data);
        // return $record;

        $images = [
            'header_image_id'   => $data['header_image_id']   ?? null,
            'featured_image_id' => $data['featured_image_id'] ?? null,
            'gallery_image_id'  => $data['gallery_image_id'] ?? null,
        ];
        $data = array_diff_key($data, array_flip(array_keys($images)));
        $record->update($data);

        $this->attachMedia($record, $images);
        return $record;
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['header_image_id']   = $this->getRecord()->firstMedia('header_image')?->id;
        $data['featured_image_id'] = $this->getRecord()->firstMedia('featured_image')?->id;
        $data['gallery_image_id']  = $this->getRecord()->firstMedia('gallery_image')?->id;
        return $data;
    }

    private function attachMedia(Model $record, array $images)
    {
        if ( $images['header_image_id'] ) {
            $media = MediaLibrary::find($images['header_image_id']);
            $record->syncMedia($media, 'header_image');
        } else {
            $record->detachMediaTags('header_image');
        }

        if ( $images['featured_image_id'] ) {
            $media = MediaLibrary::find($images['featured_image_id']);
            $record->syncMedia($media, 'featured_image');
        } else {
            $record->detachMediaTags('featured_image');
        }

        if ( $images['gallery_image_id'] ) {
            $media = MediaLibrary::find($images['gallery_image_id']);
            $record->syncMedia($media, 'gallery_image');
        } else {
            $record->detachMediaTags('gallery_image');
        }
    }
}
