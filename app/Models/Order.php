<?php

namespace App\Models;

use App\Mail\MailOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Order extends Model
{
    use HasFactory;
    protected $table="oder";

    protected $fillable = [
        'oder_date',
        'grand_total',
        'shipping_address',
        'customer_tel',
        'state',
        "fist_name",
        "last_name",
        "country",
        "city",
        "postcode",
        "email",
        "notes",
    ];

    public function Product(){
        return $this->belongsToMany(Product::class,"order_products");
    }

    public function createItem(){
        $cart = session()->has("cart") && is_array(session("cart"))?session("cart"):[];
        foreach ($cart as $item){
            DB::table("order_product")->insert([
                "qty"=>$item->buy_qty,
                "price"=>$item->price,
                "oder_id"=>$this->id,
                "product_id"=>$item->id,
            ]);
        }
        Mail::to($this->email)->send(new MailOrder());
        session()->forget("cart");
    }
}

