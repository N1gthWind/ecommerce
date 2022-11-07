<?php

namespace App\Filters\Admin\ProductFilters;

use App\Models\Product;
use App\Models\Review;

class ProductTrendingFilter
{
    function __invoke($query, $trending)
    {
        if($trending === 'All') return $query;
        return $query->where('trending', $trending);
    }
}


