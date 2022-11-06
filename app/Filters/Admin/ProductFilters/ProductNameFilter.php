<?php

namespace App\Filters\Admin\ProductFilters;

use App\Models\Product;
use App\Models\Review;

class ProductNameFilter
{
    function __invoke($query, $name)
    {

        return $query->where('name', 'like', '%' . $name . '%');
    }
}


