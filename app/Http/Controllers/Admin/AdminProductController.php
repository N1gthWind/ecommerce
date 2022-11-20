<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Filters\Admin\ProductFilter as AdminProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\AdminAddProductRequest;
use App\Http\Requests\Admin\Product\AdminEditProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminProductFilter $filters)
    {

        $products = Product::with('media', 'category', 'brand')->filter($filters)->paginate(8)->withQueryString();
        // $products = Product::filter($filters)->paginate(8)->withQueryString();
        $categories = Category::available();

        $brands = Brand::all();
        return Inertia::render('Admin/Products', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::available();
        $brands = Brand::available();

        return Inertia::render('Admin/AddProduct', [
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminAddProductRequest $request)
    {
        $product = new Product([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount_price' => $request->discount_price ?? $request->discount_price,
            'status' => $request->status,
            'trending' => $request->trending,
            'meta_title' => $request->meta_title,
        ]);
        $product->save();

        if (request()->hasFile('images')) {
            $images = request()->file('images');

            foreach ($images as $image) {
                $product
                    ->addMedia($image)
                    ->toMediaCollection('products');
            }
        }

        return redirect()->back()->with('status', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Get both avaialable and non-avaialble categories

        return Inertia::render('Admin/Show/ShowProduct', [
            'product' => Product::with('media', 'category', 'brand')->findOrFail($id),
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

        return Inertia::render('Admin/Edit/EditProduct', [
            'product' => Product::with('media', 'category', 'brand')->findOrFail($id),
            'categories' => Category::available(),
            'brands' => Brand::available(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEditProductRequest $request, $id)
    {

        $product = Product::findOrFail($id);

        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category,
            'brand_id' => $request->brand,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'discount_price' => $request->discount_price ?? $request->discount_price,
            'status' => $request->status,
            'trending' => $request->trending,
            'meta_title' => $request->meta_title,
        ]);
        // Update the product images

        //Check if the request has images
        if (request()->hasFile('images')) {
            // Remove current image

            $product->clearMediaCollection('products');

            // Add new images

            $images = request()->file('images');

            foreach ($images as $image) {
                $product
                    ->addMedia($image)
                    ->toMediaCollection('products');
            }
        }
        return redirect()->back()->with('status', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('status', 'Product deleted successfully');
    }

    public function export()
    {

        return Excel::download(new ProductExport, 'products.xlsx');
    }
}
