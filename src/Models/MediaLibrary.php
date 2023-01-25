<?php

namespace Hup234design\FilamentCms\Models;

use Plank\Mediable\Media;

class MediaLibrary extends Media
{
    protected $guarded = [];

    protected $casts = [
        'size'      => 'int',
        'crop_data' => 'array',
    ];

    public function getThumbnailUrlAttribute() {
        return $this->findVariant('thumbnail')->getUrl();
    }

    public function scopeOriginals($query) {
        return $query->whereNull('variant_name');
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
