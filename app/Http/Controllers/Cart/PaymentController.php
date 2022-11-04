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
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{




    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function checkout(Request $request)
    {
        $userId = auth()->user()->id;




        $cart_total_price = Cart::session($userId)->getTotal();

        if ($cart_total_price > 0) {
            $provider = new PayPalClient;
            $token = $provider->getAccessToken();

            $provider->setAccessToken($token);


            $order = $provider->createOrder([
                "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $cart_total_price
                        ]
                    ]
                ],
                "application_context" => [
                    "payment_method" => [
                        "payer_selected" => "PAYPAL",
                        "payee_preferred" => "IMMEDIATE_PAYMENT_REQUIRED"
                    ],
                    "return_url" => route('payment.success'),
                    "cancel_url" => route('cart.index'),
                ]
            ]);

            return Inertia::location($order['links'][1]['href']);
        } else {
            return redirect()->back();
        }
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

    public function success(PayPalRequest $request)
    {

        $provider = new PayPalClient;

        $provider->setApiCredentials(config('paypal'));

        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {
            $userId = auth()->user()->id;


            $order = Order::create([
                'user_id' => auth()->user()->id,
                'payment_id' => $response['id'],
                'paid_amount' => (float)$response['purchase_units'][0]['payments']['captures'][0]['amount']['value'],
                'status' => $response['status'],
                'created_at' => now(),
                'updated_at' => now(),

            ]);
            $cart_items = Cart::session($userId)->getContent();

            foreach ($cart_items as $cart_item) {
                $product_id =  Product::find($cart_item->id);
                $order->products()->attach($product_id, [
                    'quantity' => $cart_item->quantity,
                    'price' => $cart_item->price,
                ]);
            }



            Cart::session($userId)->clear();
            $user = User::findOrFail($userId);

            // Mail::to($user->email)->send(new OrderMail($cart_items, $order->load('products'), $user, $prices));



            //Subtract the quantity after the payment!
            foreach ($cart_items as $cart_item) {

                $product = Product::findOrFail($cart_item->associatedModel->id);

                Product::where('id', $product->id)->update([
                    'quantity' => ($product->quantity - $cart_item->quantity),
                ]);
            }

            return redirect()->route('cart.index')->with('success', 'Order made successfully! \nYou will receive the email notification soon!');
        } else {
            return Inertia::render('Error/SomethingWrong');
        }
    }
}
