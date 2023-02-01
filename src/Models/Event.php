<?php

namespace Hup234design\FilamentCms\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Plank\Mediable\Mediable;

class Event extends Model
{
    use Mediable;

    protected $guarded = [];

    protected $casts = [
        'visible'        => 'boolean',
        'date'           => 'date',
        'header_blocks' => 'array',
        'content_blocks' => 'array',
    ];

    protected $appends = ['starts', 'ends'];

    public function getStartsAttribute($value)
    {
        return $this->start_time ? Carbon::createFromFormat('H:i', $this->start_time)->format('H:i') : null;
    }

    public function getEndsAttribute($value)
    {
        return $this->end_time ? Carbon::createFromFormat('H:i', $this->end_time)->format('H:i') : null;
    }

    public function scopeUpcoming($query)
    {
        return $query->where('visible',true)->whereDate('date', '>=', Carbon::now()->startOfDay());
    }

    public function scopePrevious($query)
    {
        return $query->where('visible',true)->where('visible', true)->whereDate('date', '<', Carbon::now()->startOfDay());
    }
}
