<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        $datas =
            [
                [
                    'name' => 'Household items',
                    'slug' => 'household-items',
                    'meta_title'  => 'Household Items',
                    'status' => 1
                ],
                [
                    'name' => 'TV and entertainment',
                    'slug' => 'tv-and-entertainment',
                    'meta_title'  => 'TV and Entertainment',
                    'status' => 1
                ],
                [
                    'name' => 'Phone, Tablet, Laptop',
                    'slug' => 'phone-tablet-laptop',
                    'meta_title'  => 'Phone, Tablet, Laptop',
                    'status' => 1
                ],
                [
                    'name' => 'Computer technology',
                    'slug' => 'computer-technology',
                    'meta_title'  => 'Computer technology',
                    'status' => 1
                ],
                [
                    'name' => 'Photo-Video, Smart devices',
                    'slug' => 'photo-video-smart-devices',
                    'meta_title'  => 'Photo-Video, Smart devices',
                    'status' => 1
                ],
                [
                    'name' => 'Beauty care',
                    'slug' => 'beauty-care',
                    'meta_title'  => 'Beauty care',
                    'status' => 1
                ],
                [
                    'name' => 'Fashion jewerly and accessories',
                    'slug' => 'fashion-jewerly-and-accessories',
                    'meta_title'  => 'Household Items',
                    'status' => 1
                ],
                [
                    'name' => 'Books and movies',
                    'slug' => 'books-and-movies',
                    'meta_title'  => 'Books And Movies',
                    'status' => 1
                ]
            ];


        foreach ($datas as $key => $data) {
            Category::create([
                'name' => $data['name'],
                'slug' => $data['slug'],
                'meta_title' => $data['meta_title'],
                'status' => $data['status'],
            ]);

        }
    }
}
