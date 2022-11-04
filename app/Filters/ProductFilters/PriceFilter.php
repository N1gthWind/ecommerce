<?php

namespace App\Filters\ProductFilters;


class PriceFilter
{
    function __invoke($query, $productItem)
    {
        return $query->whereBetween('price', $productItem);
    }
}
