<?php

namespace App\Filters\Admin\OrderFilters;

use App\Models\Product;
use App\Models\Review;

class OrderDateFromFilter
{
    function __invoke($query, $date_from)
    {

        return $query->where('created_at', '>=', $date_from);
    }
}


