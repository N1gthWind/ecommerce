<?php

namespace App\Filters\Admin\ProductFilters;

use App\Models\Product;
use App\Models\Review;

class ProductStatusFilter
{
    function __invoke($query, $status)
    {

        if($status === "All") return $query;
        return $query->where('status', $status);
    }
}


