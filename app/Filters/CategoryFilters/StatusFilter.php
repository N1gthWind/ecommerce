<?php

namespace App\Filters\CategoryFilters;


class StatusFilter
{
    function __invoke($query, $categoryStatus)
    {
        if (is_array($categoryStatus)) {
            return $query->whereIn('status', $categoryStatus);
        } else {
            return $query->where('status', $categoryStatus);
        }
    }
}
