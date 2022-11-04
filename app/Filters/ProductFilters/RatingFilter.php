<?php

namespace App\Filters\ProductFilters;

use App\Models\Product;
use App\Models\Review;

class RatingFilter
{
    function __invoke($query, $rating)
    {
        $products = Product::all();
        foreach ($products as $product) {
            $product->avg_reviews = $this->calculateAverageReview($product->reviews);
        }
        $reviews_product_id = $products->whereIn('avg_reviews', $rating)->pluck('id')->toArray();
        return $query->whereIn('id', $reviews_product_id);
    }


    public function calculateAverageReview($reviews)
    {
        $sum = 0;

        foreach ($reviews as $key => $review) {
            $sum += (int)$review->stars;
        }


        return  round($reviews->count() === 0 ? 0 : $sum / $reviews->count());
    }
}
