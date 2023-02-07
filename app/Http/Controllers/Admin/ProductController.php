<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listAll(){
//        $data = Product::all(); // tra ve 1 collection(tap hop) Product object
        $data = Product::limit(20)->get();
        return view("admin.product.list");
    }
}
