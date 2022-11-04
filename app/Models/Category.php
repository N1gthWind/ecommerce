<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;


    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'status',
    ];
    protected $casts = [
        'created_at'  => 'date:Y-m-d H:i:s',
        'updated_at'  => 'date:Y-m-d H:i:s',
    ];

    // This is the scope we added
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 1)->get();
    }
}
