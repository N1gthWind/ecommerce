<?php

namespace App\Filters\ProductFilters;


class ItemFilter
{
    function __invoke($query, $productItem)
    {

        return $query->paginate($productItem)->withQueryString();
    }
}
