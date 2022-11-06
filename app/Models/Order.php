<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
        'paid_amount' => 'decimal:2',
    ];

    protected $fillable = [
        'user_id',
        'payment_id',
        'paid_amount',
        'status',
    ];

       // This is the scope we added
       public function scopeFilter($query, $filters)
       {
           return $filters->apply($query);
       }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_order')
            ->withPivot('price', 'quantity');
    }
}
