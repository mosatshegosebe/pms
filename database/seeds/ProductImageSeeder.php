<?php

use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        $productImages = [
            [
                'id' => 1,
                'product_id' => 1,
                'filename' => 'imageA.jpg',
                'mime' => 'image/jpeg',
                'created_at' => '2019-09-05 22:41:04',
                'updated_at' => '2019-09-05 22:41:04'
            ],
            [
                'id' => 2,
                'product_id' => 2,
                'filename' => 'imageB.jpg',
                'mime' => 'image/jpeg',
                'created_at' => '2019-09-05 22:41:04',
                'updated_at' => '2019-09-05 22:41:04'
            ]
        ];
        foreach ($productImages as $image) {
            ProductImage::create($image);
        }
    }
}