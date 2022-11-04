<?php

namespace App\Filters\CategoryFilters;


class SearchNameFilter
{
    function __invoke($query, $categoryName)
    {
        return $query->where('name', 'LIKE', '%' . $categoryName . '%');
    }
}
