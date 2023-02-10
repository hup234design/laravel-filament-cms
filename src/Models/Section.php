<?php

namespace Hup234design\FilamentCms\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Plank\Mediable\Mediable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Section extends Model implements Sortable
{
    use SortableTrait;
    use Mediable;

    protected $guarded = [];

    public array $sortable = [
        'order_column_name'  => 'sort_order',
        'sort_when_creating' => true,
    ];

    public function section_category() : BelongsTo
    {
        return $this->belongsTo(SectionCategory::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Order by published at
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('sort_order', 'desc');
        });
    }
}
