<?php

namespace App\Filters\Admin;

use App\Filters\ProductFilters\BrandFilter;
use App\Filters\ProductFilters\ItemFilter;
use App\Filters\ProductFilters\PriceFilter;
use App\Filters\ProductFilters\RatingFilter;
use App\Filters\ProductFilters\SearchFilter;
use App\Filters\ProductFilters\ShopCategoryFilter;
use App\Filters\ProductFilters\SortByFilter;

class ProductFilter
{
    protected $filters = [
        'sort_by' => SortByFilter::class,
        'category' => ShopCategoryFilter::class,
        'rating'  => RatingFilter::class,
        'price' => PriceFilter::class,
        'brand' => BrandFilter::class,
        'search' => SearchFilter::class,
        'items' => ItemFilter::class,
    ];

    public function apply($query)
    {


        $filters = $this->receivedFilters();
        // isset($filters['sort_by']) ?? $filters['sort_by'] = 'most_popular';
        // $filters['items'] ?? $filters['items'] = '20';

        foreach ($filters as $name => $value) {

            $filterInstance = new $this->filters[$name];

            $query = $filterInstance($query, $value);
        }
        return $query;
    }


    public function receivedFilters()
    {

        return request()->only(array_keys($this->filters));
    }
}
