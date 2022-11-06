<?php

namespace App\Filters\Admin\OrderFilters;

use App\Models\Product;
use App\Models\Review;

class OrderSearchFilter
{
    function __invoke($query, $search)
    {
        $query->whereHas('user', function ($query) use ($search) {
           $query->where('email', 'like', '%' . $search . '%');
        });
        return $query;
    }
}
