<?php

namespace Hup234design\FilamentCms\Models;

use Plank\Mediable\Media;

class MediaLibrary extends Media
{
    protected $guarded = [
        'id',
        'disk',
        'directory',
        'filename',
        'extension',
        'mime_type',
        'aggregate_type',
        'variant_name',
        'original_media_id'
    ];

    protected $casts = [
        'size' => 'int',
        'crop_data' => 'array',
    ];

    public function getThumbnailUrlAttribute() {
        return $this->findVariant('thumbnail')->getUrl();
    }

    public function scopeOriginals($query) {
        return $query->whereNull('variant_name');
    }

    public function getFullFileNameAttribute() {
        return ($this->original_filename ?: $this->filename ) . "." .$this->extension;
    }

    public function getFileSizeAttribute(): string
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];
        $size = $this->size;
        for ($i = 0; $size > 1024; $i++) {
            $size /= 1024;
        }
        return round($size, 2).' '.$units[$i];
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            if( $model->isOriginal() ) {
                $model->getAllVariants()->each(function (MediaLibrary $variant) {
                    $variant->delete();
                });
            }
        });
    }
}
