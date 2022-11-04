<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Stripe\StripeObject;

class StripeController extends Controller
{
    public function index()
    {
    }

    public function checkout()
    {
        $stripe = new \Stripe\StripeClient(
            env('STRIPE_SECRET')
        );
        $session = $stripe->checkout->sessions->create([
            'success_url' => 'https://example.com/success',
            'cancel_url' => 'https://example.com/cancel',
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'Product 1'
                        ],
                        'unit_amount' => 500,
                    ],
                    'quantity' => 2,
                ],
            ],
            'mode' => 'payment',
        ]);
        return Inertia::location($session->url);
    }

    public function success()
    {
    }
}
