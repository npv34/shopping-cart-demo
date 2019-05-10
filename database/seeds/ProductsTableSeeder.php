<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = "Women's Blouse";
        $product->image = "images/products/img-1.jpg";
        $product->price = 1000;
        $product->price_old = 2000;
        $product->save();

        $product = new Product();
        $product->name = "Men's Plain Tshirt";
        $product->image = "images/products/img-2.jpg";
        $product->price = 1000;
        $product->price_old = 2000;
        $product->save();

        $product = new Product();
        $product->name = "Men's Plain Tshirt";
        $product->image = "images/products/img-3.jpg";
        $product->price = 1000;
        $product->price_old = 2000;
        $product->save();
    }
}
