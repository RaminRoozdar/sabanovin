<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Prouduct;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'title' => 'کارتخوان مدل 7210',
                'description' => 'برند محبوب پکس',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Samsung',
                'count' => 10,
                'amount' => 100
            ],
            [
                'title' => 'کارتخوان مدل 8210',
                'description' => 'برند محبوب مورفان ',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Iphone',
                'count' => 10,
                'amount' => 500
            ],
            [
                'title' => 'کارتخوان مدل s910',
                'description' => 'برند محبوب پکس',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=Google',
                'count' => 10,
                'amount' => 400
            ],
            [
                'title' => 'کارتخوان مدل وی 71',
                'description' => 'برند محبوب آنفو',
                'image' => 'https://dummyimage.com/200x300/000/fff&text=LG',
                'count' => 10,
                'amount' => 200
            ]
        ];

        foreach ($products as $key => $value) {
           Product::create($value);
        }
    }
}
