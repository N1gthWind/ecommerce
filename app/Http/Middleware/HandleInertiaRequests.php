<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{


    // Set root template via method
    public function rootView(Request $request)
    {


        if ($request->routeIs('admin.*')) {
            return 'admin';
        }

        return 'market';
    }

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user()?->loadCount('wishlists'),
                // Lazily
                'cart_count' => fn () => $request?->user()
                    ? Cart::session($request?->user()?->id)->getContent()->count()
                    : null,
                'cart_total_price' => fn () => $request?->user()
                    ? Cart::session($request?->user()?->id)->getTotal()
                    : null,

            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                    'query' => $request->query(),
                ]);
            },
            'assets' => [
                'logo' => asset('assets/logo.png'),
                'avatar' => asset('assets/images/avatar.jpg'),
                'no_image_product' => asset('assets/market/no_image_product.jpg'),
            ],
            'flash' => [
                'success' => session()->get('success'),
                'status' => session()->get('status'),
                'error' => session()->get('error'),
                'cart_status' => session()->get('cart_status'),
            ],
            'data' => [
                'categories' => Category::available(),

            ]

        ]);
    }
}
