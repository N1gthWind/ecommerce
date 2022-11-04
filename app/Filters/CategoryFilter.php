<?php

namespace App\Filters;

use App\Filters\CategoryFilters\SearchNameFilter;
use App\Filters\CategoryFilters\StatusFilter;

class CategoryFilter
{
    protected $filters = [

        'status' => StatusFilter::class,
        'search' => SearchNameFilter::class,
    ];

    public function apply($query)
    {
        foreach ($this->receivedFilters() as $name => $value) {

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
