<?php

namespace App\Filters\ProductFilters;

use App\Models\Category;

class ShopCategoryFilter
{
    function __invoke($query, $productItem)
    {

        return $query->where('category_id', $productItem);
    }
}
