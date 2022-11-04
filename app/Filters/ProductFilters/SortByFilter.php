<?php

namespace App\Filters\ProductFilters;


class SortByFilter
{
    function __invoke($query, $productItem)
    {
        switch ($productItem) {

            case 'Newest':
                return $query->orderBy('created_at', 'desc');
                break;
            case 'Oldest':
                return $query->orderBy('created_at', 'asc');
                break;
            case 'Price: High to Low':
                return $query->orderBy('price', 'desc');
                break;
            case 'Price: Low to High':
                return $query->orderBy('price', 'asc');
                break;
            default:
                return $query->orderBy('created_at', 'desc');
                break;
        }
    }
}
