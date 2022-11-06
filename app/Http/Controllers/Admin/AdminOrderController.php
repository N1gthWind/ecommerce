<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use App\Filters\Admin\OrderFilter;
use App\Filters\Admin\ProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\OrderFilterRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrderFilterRequest $request,OrderFilter $filters)
    {


        $orders = Order::with('products', 'user')->withCount('products')->filter($filters)->paginate(8)->withQueryString();
        return Inertia::render('Admin/Orders', [
            'orders' => $orders,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        $order->load('products.media', 'products.category' , 'user')->loadCount('products');
        return Inertia::render('Admin/Show/ShowOrder', [
            'order' => $order
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export()
    {

        return Excel::download(new OrderExport, 'orders.xlsx');
    }
}
