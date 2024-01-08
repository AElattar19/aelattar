<?php

namespace App\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Track extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, HasSlug, InteractsWithMedia;

    protected $guarded = [];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->usingSeparator('-');
    }

    public function Lessons(): HasMany
    {
       return $this->hasMany(Lesson::class, 'track_id');
    }

    public function parents()
    {
        return $this->belongsTo(Self::class,'parent');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Self::class,'parent');
    }
    
}


