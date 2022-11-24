<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Inertia\Inertia;

class AdminDashboardController extends Controller
{

    public function index()
    {

        $users_count = User::count();
        $products_count = Product::count();
        $orders_count = Order::count();
        $not_completed_orders = Order::whereNot('status', 'COMPLETED')->count();

        return Inertia::render('Admin/Dashboard', [
            'logo' => asset('assets/logo.png'),
            'avatar' => asset('assets/images/avatar.jpg'),
            'users_count' => $users_count,
            'products_count' => $products_count,
            'orders_count' => $orders_count,
            'not_completed_orders' => $not_completed_orders,
        ]);
    }

}
