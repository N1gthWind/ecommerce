<?php

namespace App\Filters\ProductFilters;


class BrandFilter
{
    function __invoke($query, $productItem)
    {

        return $query;
    }
}
