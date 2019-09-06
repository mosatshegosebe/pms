<?php

use App\Models\Product;

class ProductSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        $products = [
          [
              'id'=> 1,
              'name' => 'Product Test 1',
              'sku' => 'test12345',
              'price' => 300,
              'description' => 'Sample Description 1',
              'created_at' => '2019-09-05 22:41:04',
              'updated_at' => '2019-09-05 22:41:04'
          ],
          [
              'id'=> 2,
              'name' => 'Product Test 2',
              'sku' => 'test123',
              'price' => 500,
              'description' => 'Sample Description 2',
              'created_at' => '2019-09-05 22:41:04',
              'updated_at' => '2019-09-05 22:41:04'
          ]

        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}