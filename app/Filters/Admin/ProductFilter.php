<?php

namespace App\Filters\Admin;

use App\Filters\Admin\ProductFilters\ProductBrandFilter;
use App\Filters\Admin\ProductFilters\ProductCategoryFilter;
use App\Filters\Admin\ProductFilters\ProductIdFilter;
use App\Filters\Admin\ProductFilters\ProductNameFilter;
use App\Filters\Admin\ProductFilters\ProductStatusFilter;
use App\Filters\Admin\ProductFilters\ProductTrendingFilter;
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
        'id' => ProductIdFilter::class,
        'name' => ProductNameFilter::class,
        'status' => ProductStatusFilter::class,
        'trending' => ProductTrendingFilter:: class,
        'brand' => ProductBrandFilter::class,
        'category' => ProductCategoryFilter::class,
    ];

    public function apply($query)
    {


        $filters = $this->receivedFilters();
        // isset($filters['sort_by']) ?? $filters['sort_by'] = 'most_popular';
        // $filters['items'] ?? $filters['items'] = '20';

        foreach ($filters as $name => $value) {

            $filterInstance = new $this->filters[$name];

            if($value === null) continue;

            $query = $filterInstance($query, $value);
        }
        return $query;
    }


    public function receivedFilters()
    {

        return request()->only(array_keys($this->filters));
    }
}
