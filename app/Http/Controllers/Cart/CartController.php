<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $userId = auth()->user()->id;
        $cart_items = Cart::session($userId)->getContent();


        foreach ($cart_items as $key => $cart_item) {

            $cart_item->put('total_price', $cart_item->getPriceSum());
        }


        foreach ($cart_items as $key => $cart_item) {
        }

        $cart_total_price = Cart::session($userId)->getTotal(); // for a specific user's cart


        return Inertia::render('Cart/Index', [
            'cart_items' => $cart_items,
            'cart_total_price' =>  $cart_total_price,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->id)->load('media');

        if ($product->quantity <= 0) {
            return redirect()->back()->with('cart_status', 'Can\'t add this product to the cart');
        }



        $user_id = auth()->user()->id;
        if (!Cart::session($user_id)->has((int)$request->id)) {
            Cart::session($user_id)->add([
                'id' => (int)$product->id,
                'name' => $product->name,
                'price' => (float)$product?->discount_price == null ? (float)$product?->price : (float)$product?->discount_price,
                'quantity' => (int)1,
                'attributes' => [],
                'associatedModel' => $product,
            ]);
        } else {
            $cart_item = Cart::session($user_id)?->get($request->id);
            $product_item_quantity = Product::findOrFail($request->id)->quantity;



            if ((int)$cart_item->quantity >= $product_item_quantity) {
                return redirect()->back()->with('cart_status', 'Product quantity exceeded!');
            }

            if ((int)$cart_item->quantity > 0 && (int)$cart_item->quantity < 10)
                Cart::session($user_id)->update((int)$request->id, [
                    'quantity' => [
                        'relative' => false,
                        'value' => (int)$cart_item->quantity + 1
                    ],
                ]);
            else {
                return redirect()->back();
            }
        }
        return redirect()->back()->with('cart_status', 'Product Added to cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'quantity' => ['min:1', 'max:10', 'required'],
        ]);

        $user_id = auth()->user()->id;

        $product = Product::findOrFail($request->id);
        $product_quantity = $product->quantity;



        if ((int)$request->quantity > $product->quantity) {
            return redirect()->back()->with('cart_status', 'Product quantity exceeded!');
        } else {
            Cart::session($user_id)->update((int)$request->id, [
                'quantity' => [
                    'relative' => false,
                    'value' => (int)$request->quantity
                ],
            ]);
        }



        return redirect()->back()->with('cart_status', 'Product quantity updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_id = auth()->user()->id; // or any string represents user identifier
        Cart::session($user_id)->remove((int)$id);

        return redirect()->back();
    }
}
