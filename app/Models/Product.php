<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia, Searchable;

    public static function boot()
    {
        parent::boot();
        static::created(function ($item) {
        });
    }


    protected $fillable = [
        'id',
        'category_id',
        'name',
        'slug',
        'brand_id',
        'description',
        'quantity',
        'price',
        'discount_price',
        'status',
        'trending',
        'meta_title',
    ];

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
        'discount_price' => 'decimal:2',
    ];

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }

    // This is the scope we added
    public function scopeFilter($query, $filters)
    {

        return $filters->apply($query);
    }

    public function scopeAvailable($query)
    {
        return $query->where('quantity', '>=', 1);
    }

    public function scopeSpecialOffer($query)
    {
        return $query->where('trending', '=', 1)
            ->whereNot('discount_price', '=', null);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function available_category()
    {
        return $this->category()->where('status', 1);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order')
            ->withPivot('price', 'quantity');
    }
}
