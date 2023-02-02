<?php

namespace Hup234design\FilamentCms\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Page extends Model implements Sortable
{
    use Mediable;
    use SortableTrait;

    protected $guarded = ['featured_image_id'];

    protected $casts = [
        'home'           => 'boolean',
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

        // Order by home page then sort order
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('home', 'desc')
                ->orderBy('sort_order', 'asc');
        });

        // when saved update home page flag
        static::saved(function ($model) {
            if ($model->home) {
                Page::whereNot('id', $model->id)->where('home', true)->update(['home' => false]);
            }
        });

    }

}
