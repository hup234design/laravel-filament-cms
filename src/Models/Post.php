<?php

namespace Hup234design\FilamentCms\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Plank\Mediable\Mediable;

class Post extends Model
{
    use Mediable;

    protected $guarded = [];

    protected $casts = [
        'published'      => 'boolean',
        'published_at'   => 'datetime',
        'header_blocks' => 'array',
        'content_blocks' => 'array',
    ];

    public function post_category() : BelongsTo
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function scopeLive($query)
    {
        return $query->where('published', true)->whereDate('published_at', '<=', Carbon::now());
    }

    public function scopeRecent($query)
    {
        return $query->live()->take(5);
    }

    protected static function boot()
    {
        parent::boot();

        // Order by published at
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('published_at', 'desc');
        });
    }
}
