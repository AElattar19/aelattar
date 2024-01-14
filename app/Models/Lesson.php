<?php

namespace App\Models;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lesson extends Model
{
    use HasFactory, SoftDeletes, Searchable;
    protected $guarded = [];


    public function Track()
    {
        return $this->belongsTo(Track::class);
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
        ];
    }

}
