<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Http\Requests\ShopFilterRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function home()
    {


        $most_bought_product_ids = $this->getMostBoughtProducts(5);
        $most_bought_products = Product::whereIn('id', array_keys($most_bought_product_ids->toArray()))->with('media')->withCount('reviews')->get();
        foreach ($most_bought_products as $product) {
            $product->avg_reviews = $this->calculateAverageReview($product->reviews);
        }



        $latest_products = Product::latest()->take(5)->with('media')->withCount('reviews')->get();
        foreach ($latest_products as $product) {
            $product->avg_reviews = $this->calculateAverageReview($product->reviews);
        }



        return Inertia::render('Market/Index', [
            'logo' => asset('assets/logo.png'),
            'latest_products' => $latest_products,
            'most_bought_products' => $most_bought_products

        ]);
    }

    public function shop(ShopFilterRequest $request, ProductFilter $filters)
    {

        $special_offers = Product::specialOffer()->with('media')->inRandomOrder()->take(5)->get();

        $products = Product::available()->with(['media', 'brand', 'category', 'reviews'])->withCount('reviews')->filter($filters);


        foreach ($products as $product) {
            $product->avg_reviews = $this->calculateAverageReview($product->reviews);
        }


        $categories = Category::available();

        $brands = Brand::all();
        $all_products = Product::all();
        $each_review_avg_count = $this->getCountOfEachProductAverageRating($all_products);


        $product_count = $products->total();

        return Inertia::render('Market/Shop', [
            'logo' => asset('assets/logo.png'),
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'special_offers' => $special_offers,
            'each_review_avg_count' => $each_review_avg_count,
            'product_count' =>  $product_count,
        ]);
    }

    public function product_detail(Product $product)
    {
        $reviews = $product->reviews;
        $user = Auth::user();

        $avg_reviews = $this->calculateAverageReview($reviews);



        return Inertia::render('Market/ProductDetails', [
            'product' => $product->load(['media', 'reviews.user', 'category'])->loadCount('reviews'),
            'avg_review_rating' => $avg_reviews,
            'can_review' =>  Auth::user()?->can('create', [Review::class, $product]),

        ]);
    }

    public function error404()
    {
        return Inertia::render('Errors/SomethingWrong');
    }

    public function calculateAverageReview($reviews)
    {
        $sum = 0;

        foreach ($reviews as $key => $review) {
            $sum += (int)$review->stars;
        }


        return  $reviews->count() === 0 ? 0 : $sum / $reviews->count();
    }

    public function getCountOfEachProductAverageRating($products)
    {
        foreach ($products as $product) {
            $product->avg_reviews = $this->calculateAverageReview($product->reviews);
        }

        $review_count = [

            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0,
        ];

        foreach ($products as $product) {

            $avg_review = (int)round($product->avg_reviews);

            if ($avg_review > 5 || $avg_review <= 0) {
                continue;
            }
            $review_count[$avg_review] += 1;
        }

        return $review_count;
    }

    public function getMostBoughtProducts($amount)
    {
        $all_products = Product::all();

        $most_order = collect([]);

        foreach ($all_products as $product) {
            $sum_of_ordered_product = 0;
            foreach ($product->orders as $order) {
                $sum_of_ordered_product += $order->pivot->quantity;
            }
            $most_order->put($product->id, $sum_of_ordered_product);
        }

        return $most_order->sortDesc()->take($amount);
    }
}
