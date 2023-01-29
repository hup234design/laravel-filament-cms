<?php

namespace Hup234design\FilamentCms\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $guarded = [];

    protected $casts = [
        'visible'     => 'boolean',
        'received_at' => 'datetime',
    ];

    public function scopeVisible($query)
    {
        return $query->where('visible', true);
    }

    public function getTitleAttribute(): string
    {
        return implode(" | ", array_filter([
            $this->name,
            $this->location,
            $this->company,
            $this->job_title,
        ]));
    }

    protected static function boot()
    {
        parent::boot();

        // Order by received at
        static::addGlobalScope('order', function (Builder $builder) {
            $builder->orderBy('received_at', 'desc');
        });
    }
}
