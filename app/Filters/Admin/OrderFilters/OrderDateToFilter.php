<?php

namespace App\Filters\Admin\OrderFilters;

use App\Models\Product;
use App\Models\Review;

class OrderDateToFilter
{
    function __invoke($query, $date_to)
    {

        return $query->where('created_at', '<=', $date_to);
    }
}


