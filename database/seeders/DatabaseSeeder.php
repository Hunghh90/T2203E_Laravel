<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\order;
use App\Models\order_product;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        Category::factory(100)->create();
        Product::factory(1000)->create();
//        Order::factory(1000)->create();
//        OrderProduct::factory(1000)->create();

    }
}
