<?php

namespace App\Models;

use App\Casts\DiffForHuman;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'text',
        'stars',
    ];

    protected $casts = [
        'created_at'  => DiffForHuman::class,
        'updated_at'  => 'date:Y-m-d H:i:s',
        'stars' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
