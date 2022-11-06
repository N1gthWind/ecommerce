<?php

namespace App\Filters\Admin\ProductFilters;

use App\Models\Product;
use App\Models\Review;

class ProductIdFilter
{
    function __invoke($query, $id)
    {
        return $query->where('id', 'like', '%' . $id . '%');
    }
}


