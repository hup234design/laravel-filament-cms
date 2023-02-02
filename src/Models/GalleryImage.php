<?php

namespace Hup234design\FilamentCms\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Plank\Mediable\Mediable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class GalleryImage extends Model implements Sortable
{
    use Mediable;
    use SortableTrait;

    protected $guarded = [];

    public array $sortable = [
        'order_column_name'  => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }

    public function getThumbnailUrlAttribute(): ?string {
        if($this->hasMedia('gallery_image')) {
            return $this->firstMedia('gallery_image')->findVariant('thumbnail')?->getUrl();
        }
        return null;
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
