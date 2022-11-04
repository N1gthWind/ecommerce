<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::all();
    }

    public function headings(): array
    {
        return [
            'id',
            'category_id',
            'name',
            'slug',
            'brand_id',
            'description',
            'quantity',
            'price',
            'discount_price',
            'status',
            'trending',
            'meta_title',
        ];
    }
}
