<?php

namespace Hup234design\FilamentCms\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SectionCategory extends Model
{
    protected $guarded = [];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class)->with('featured_image')->orderBy('sort_order', 'asc');
    }
}
