<?php

namespace App\Filters\Admin\ProductFilters;

use App\Models\Product;
use App\Models\Review;

class ProductCategoryFilter
{
    function __invoke($query, $category)
    {

        if($category === 'All') return $query;

        return $query->whereHas('category', function ($query) use($category) {
            $query->where('id', $category);
        });
    }
}


