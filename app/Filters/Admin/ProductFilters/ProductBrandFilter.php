<?php

namespace App\Filters\Admin\ProductFilters;

use App\Models\Product;
use App\Models\Review;

class ProductBrandFilter
{
    function __invoke($query, $brand)
    {

        if($brand === 'All') return $query;

        return $query->whereHas('brand', function ($query) use($brand) {
            $query->where('id', $brand);
        });
    }
}


