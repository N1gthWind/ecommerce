<?php

namespace App\Filters\Admin\ProductFilters;

use App\Models\Product;
use App\Models\Review;

class ProductBrandFilter
{
    function __invoke($query, $date_from)
    {

        return $query;
    }
}


