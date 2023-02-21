<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listAll(){

        $data = Category::orderBy("id","desc")->paginate(20);
        return view("admin.product.list",[
            "data"=>$data
        ]);
    }

    public function createProduct(){
        $categories = Category::orderBy("name","asc")->get();
        return view("admin.product.create",compact("categories"));
    }

    public function store(Request $request){
        $data = $request->all();
        Product::create($data);
        return redirect()->to("admin/product");
    }
}
