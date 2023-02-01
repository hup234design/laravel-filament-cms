<?php

namespace Hup234design\FilamentCms\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Plank\Mediable\Mediable;

class Project extends Model
{
    use Mediable;

    protected $guarded = [];

    protected $casts = [
        'visible'        => 'boolean',
        'date'           => 'datetime',
        'header_blocks' => 'array',
        'content_blocks' => 'array',
    ];

    public function project_category() : BelongsTo
    {
        return $this->belongsTo(ProjectCategory::class);
    }

    public function scopeVisible($query)
    {
        return $query->where('visible', true);
    }
}
