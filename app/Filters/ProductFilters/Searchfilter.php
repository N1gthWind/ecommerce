<?php

namespace App\Filters\ProductFilters;

use App\Models\Product;
use App\Models\Review;

class SearchFilter
{
    function __invoke($query, $search)
    {
        $query->where('name', 'like', '%' . $search . '%');
        return $query;
    }
}
