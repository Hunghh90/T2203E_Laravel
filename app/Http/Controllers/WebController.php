<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function aboutUs()
    {
        return view("aboutus");
    }

    public function home()
    {
        $product = Product::limit(8)->orderBy("id","desc")->get();
        return view("home",compact("product"));
    }

    public function detail(Product $product){
        $related_products = Product::CategoryFilter($product->category_id)->where("id","!=",$product->id)->get()->random(4);
        $best_seller_ids = DB::table("order_product")->groupBy("product_id")->orderBy("sum_qty","desc")
            ->limit(4)->select(DB::raw("product_id, sum(qty) as sum_qty"))->get()->pluck("product_id")->toArray();
//        $best_seller = Product::whereIn("id",$best_seller_ids);
        $best_seller = Product::find($best_seller_ids);
        return view("users.product.detail",compact("product","related_products","best_seller"));
    }

    public function addToCart(Product $product,Request $request){

        $request->validate([
            "qty"=>"required|numeric|min:1"
        ]);
        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        $flag = true;
        foreach ($cart as $item){
            if($item->id == $product->id){
                $item->buy_qty += $request->get("qty");
                $flag = false;
                break;
            }
        }
        if($flag){
            $product->buy_qty = $request->get("qty");
            $cart[] = $product;
        }
        session(["cart"=>$cart]);
        return redirect()->back();

    }

    public function shoppingCart(){

        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        $grandtotal=0;
        $can_checkout = true;
        foreach ($cart as $item) {
            $grandtotal += $item->price * $item->buy_qty;
            if ($can_checkout && $item->qty == 0) {
                $can_checkout = false;
            }
        }


       return view("users.product.shopping_cart",compact("cart","grandtotal","can_checkout"));
    }

    public function checkOut(){
        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        if(count($cart) == 0){
            return redirect()->to("/shopping-cart");
        }
        $grandtotal=0;
        foreach ($cart as $item){
            $grandtotal += $item->price*$item->buy_qty;
        }
        return view("users.product.check_out",compact("cart","grandtotal"));
    }

    public function remove(Product $product){
        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        foreach ($cart as $key=>$item){
            if($item->id == $product->id){
                unset($cart[$key]);
                break;
            }
        }
        session(["cart"=>$cart]);
        return redirect()->back();
    }

    public function placeOrder(Request $request){
        $request->validate([
        "firstname"=>"required",
        "lastname"=>"required",
        "country"=>"required",
        "address"=>"required",
        "city"=>"required",
        "zip"=>"required",
        "phone"=>"required",
        "email"=>"required",
        "notes"=>"required",

    ]);
        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        if(count($cart)==0) return abort(404);
        $grandtotal=0;
        $can_checkout = true;
        foreach ($cart as $item) {
            $grandtotal += $item->price * $item->buy_qty;
            if ($can_checkout && $item->qty == 0) {
                $can_checkout = false;
            }
        }
        if(!$can_checkout) return abort(404);
        $order = Order::create([
            'oder_date'=>now(),
            'grand_total'=>$grandtotal,
            'shipping_address'=>$request->get("address"),
            'customer_tel'=>$request->get("phone"),
            'state'=>$request->get("state"),
            'fist_name'=>$request->get("firstname"),
            'last_name'=>$request->get("lastname"),
            'country'=>$request->get("country"),
            'city'=>$request->get("city"),
            'postcode'=>$request->get("zip"),
            'email'=>$request->get("email"),
            'notes'=>$request->get("notes"),


           // 'status'=>$this->faker->boolean
        ])->createItem();

        return redirect()->to("/");
    }

}
