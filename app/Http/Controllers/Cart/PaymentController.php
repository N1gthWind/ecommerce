<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayPalRequest;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;
use Ramsey\Uuid\Guid\Guid;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function checkout(Request $request)
    {
        return redirect()->route('payment.success');
    }
    public function cancel(Request $request)
    {
        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $provider->getAccessToken();

        $response = $provider->showOrderDetails($request['token']);

        if (isset($response['status']) && $response['status'] === 'CREATED') {
            dump('Canceled');
        } else {
            abort(404);
        }
    }

    public function success()
    {
        // dd(1);
        $userId = auth()->user()->id;
        $cart_total_price = Cart::session($userId)->getTotal();

        $userId = auth()->user()->id;

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'payment_id' => Guid::uuid4()->toString(),
            'paid_amount' => (float) $cart_total_price,
            'status' => 'SUCCESS',
            'created_at' => now(),
            'updated_at' => now(),

        ]);
        $cart_items = Cart::session($userId)->getContent();

        foreach ($cart_items as $cart_item) {
            $product_id = Product::find($cart_item->id);
            $order->products()->attach($product_id, [
                'quantity' => $cart_item->quantity,
                'price' => $cart_item->price,
            ]);
        }

        $total_price = Cart::session($userId)->getSubTotal();
        $total_price_without_fee = Cart::session($userId)->getSubTotalWithoutConditions();

        Cart::session($userId)->clear();
        $user = User::findOrFail($userId);

        //Get total price
        $total_price = $order->paid_amount;
        //Total price without fee

        $prices = (object) [
            'total_price' => $total_price,
            'total_price_without_fee' => $total_price_without_fee,
        ];

        Mail::to($user->email)->send(new OrderMail($cart_items, $order->load('products'), $user, $prices));

        //Subtract the quantity after the payment!
        foreach ($cart_items as $cart_item) {

            $product = Product::findOrFail($cart_item->associatedModel->id);

            Product::where('id', $product->id)->update([
                'quantity' => ($product->quantity - $cart_item->quantity),
            ]);
        }


        return redirect()->away(route('cart.index'))->with('success', 'Payment completed successfully!');
    }
}
