<?php

namespace App\Filters\Admin\ProductFilters;

use App\Models\Product;
use App\Models\Review;

class ProductTrendingFilter
{
    function __invoke($query, $trending)
    {

        return $query->where('trending', $trending);
    }
}


