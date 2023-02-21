<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\order;
use App\Models\order_product;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            "name"=>"admin",
            "email"=>"admin@localhost",
            "password"=>bcrypt("admin")
        ]);
        Admin::create([
            "user_id"=>$admin->id,
            "role"=>"ADMIN"
        ]);
        User::factory(10)->create();
        Category::factory(100)->create();
        Product::factory(1000)->create();
        Order::factory(50)->create();
//        OrderProduct::factory(1000)->create();
        for($i=1;$i<51;$i++){

            $random = random_int(1,10);
            $product = Product::all()->random($random);
            $grand_total = 0;
            foreach($product as $p){
                $qty=random_int(1,10);
                $grand_total += $qty*$p->price;
                DB::table("order_product")->insert([
                    "oder_id"=>$i,
                    "product_id"=>$p->id,

                    "price"=>$p->price,
                    "qty"=>$qty
                ]);
            }
            Order::find($i)->update(["grand_total"=>$grand_total]);
        }

    }
}
