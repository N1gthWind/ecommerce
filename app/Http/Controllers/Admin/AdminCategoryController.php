<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CategoryExport;
use App\Exports\ProductExport;
use App\Filters\CategoryFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\AdminCategoryEditRequest;
use App\Http\Requests\Admin\CategoryFilterRequest;
use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelExcel;

class AdminCategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryFilterRequest $request, CategoryFilter $filters)
    {

        $categories = Category::filter($filters)->paginate(8)->withQueryString();
        return Inertia::render('Admin/Categories', [
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
        return Inertia::render('Admin/AddCategory', [
            'logo' => asset('assets/logo.png'),
            'avatar' => asset('assets/images/avatar.jpg'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(CategoryCreateRequest $request)
    {

        $category = Category::create([
            'name' => $request->name,
            "description" =>  $request->description,
            "slug" => $request->slug,
            "meta_title" => $request->meta_title,
            "status" => $request->status,
        ]);


        return redirect()->back()->with('success', 'Successfully created the category!');

        // if ($request->has('image')) {
        //     $file = $request->file('image');
        //     $filename = md5(Str::uuid() . time()) . '.' . $file->getClientOriginalExtension();
        //     $product->addMediaFromRequest('image')->usingFileName($filename)->toMediaCollection();
        // }
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
        $category = Category::findOrFail($id);
        return Inertia::render('Admin/Edit/EditCategory', [
            'category' =>  $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCategoryEditRequest $request, $id)
    {
        $category = Category::find($id);

        $category->update($request->only(["name", "slug", "status", "meta_title"]));
        return redirect()->back()->with('status', 'Category updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()->back()->with('status', 'Deleted successfully!');
    }

    public function export()
    {
        return Excel::download(new CategoryExport, 'categories.xlsx');
    }
}
