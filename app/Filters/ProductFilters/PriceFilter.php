<?php

namespace App\Filters\ProductFilters;

class PriceFilter
{
    public function __invoke($query, $productItem)
    {
        return $query->whereBetween('price', $productItem);
    }
}
