<?php

namespace App\Filters\Admin;

use App\Filters\Admin\OrderFilters\OrderDateFrom;
use App\Filters\Admin\OrderFilters\OrderDateFromFilter;
use App\Filters\Admin\OrderFilters\OrderDateTo;
use App\Filters\Admin\OrderFilters\OrderDateToFilter;
use App\Filters\Admin\OrderFilters\OrderSearchFilter;
use App\Filters\Admin\OrderFilters\OrderStatusFilter;
use App\Filters\ProductFilters\BrandFilter;
use App\Filters\ProductFilters\ItemFilter;
use App\Filters\ProductFilters\PriceFilter;
use App\Filters\ProductFilters\RatingFilter;
use App\Filters\ProductFilters\SearchFilter;
use App\Filters\ProductFilters\ShopCategoryFilter;
use App\Filters\ProductFilters\SortByFilter;
use App\Models\Order;


class OrderFilter
{
    protected $filters = [
        'date_from' => OrderDateFromFilter::class,
        'date_to' => OrderDateToFilter::class,
        'status' => OrderStatusFilter::class,
        'search' => OrderSearchFilter::class,
    ];

    public function apply($query)
    {


        $filters = $this->receivedFilters();




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
