<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteWishListRequest;
use App\Models\WishList;
use App\Http\Requests\StoreWishListRequest;
use App\Http\Requests\UpdateWishListRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Inertia\Inertia;

class WishListController extends Controller
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
        // $wishlist = User::with('wishlists')->where('id', '=', auth()->user()->id)->get();
        $wishlist = auth()->user()->wishlists->load('product.media', 'product.category');




        return Inertia::render('Wishlist/Index', [
            'wishlists' => $wishlist,
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
     * @param  \App\Http\Requests\StoreWishListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishListRequest $request)
    {

        if ($this->checkIfProductAlreadyExistInWishlist($request)) {
            return redirect()->back()->with('error', 'Already added!');
        } else {
            WishList::create([
                'user_id' => auth()->user()->id,
                'product_id' => $request->product_id,
            ]);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function show(WishList $wishList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function edit(WishList $wishList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWishListRequest  $request
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWishListRequest $request, WishList $wishList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WishList  $wishList
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        if ($request->user()->cannot('delete', WishList::findOrFail($id))) {
            return Inertia::render('Errors/SomethingWrong');
        }
        WishList::destroy($id);


        return redirect()->back()->with('status', 'Wishlist deleted');
    }



    private function checkIfProductAlreadyExistInWishlist($request)
    {
        return auth()->user()->wishlists->contains('product_id', $request->product_id);
    }
}
