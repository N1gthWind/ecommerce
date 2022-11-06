<?php

namespace App\Filters\Admin\OrderFilters;

use App\Models\Product;
use App\Models\Review;

class OrderStatusFilter
{
    function __invoke($query, $status)
    {

        if($status === "All") return $query;
        $statuses = [
            '0' => ['0', 'NOT_COMPLETED'],
            '1' => ['COMPLETED']
        ];


        $query->whereIn('status', $statuses[$status]);
        return $query;
    }
}
