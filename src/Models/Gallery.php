<?php

namespace Hup234design\FilamentCms\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Plank\Mediable\Mediable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Gallery extends Model implements Sortable
{
    use Mediable;

    use SortableTrait;

    protected $guarded = [
        'gallery_model_id'
    ];

    public array $sortable = [
        'order_column_name'  => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function gallery_images(): HasMany
    {
        return $this->hasMany(GalleryImage::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Order by sort order
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('sort_order', 'asc');
        });
    }
}
