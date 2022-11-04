<?php
namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoryExport implements FromCollection
{
    public function collection()
    {
        return Category::all();
    }
}

    // public function headings(): array
    // {
    //     return [
    //         'id',
    //         'name',
    //         'slug',
    //         'meta_title',
    //         'status',
    //     ];
    // }

