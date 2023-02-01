<?php

namespace Hup234design\FilamentCms\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Service extends Model implements Sortable
{
    use Mediable;

    use SortableTrait;

    protected $guarded = [];

    protected $casts = [
        'visible'        => 'boolean',
        'header_blocks' => 'array',
        'content_blocks' => 'array',
    ];

    public array $sortable = [
        'order_column_name'  => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function scopeVisible($query)
    {
        return $query->where('visible', true);
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
