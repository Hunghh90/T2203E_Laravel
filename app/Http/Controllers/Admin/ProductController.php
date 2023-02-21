<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
//    public function __construct(){
//        $this->middleware("auth");
//    }
    public function listAll(Request $request){
        $search = $request->get("search");
        $category_id=$request->get("category_id");
        $status=$request->get("status");
        $categories = Category::all();

//        $data = Product::all(); // tra ve 1 collection(tap hop) Product object
//        $data = Product::limit(20)->offset(20)->get();
        //return view("admin.product.list",compact('data'));
//        $data = Product::limit(20)->orderBy("name","desc")->get();
//        $data = Product::where('price','>',500)->where('status',true)->where('name','like','%ty%')->orderBy("id","desc")->paginate(20);
//        $data = Product::leftJoin("categories",'categories.id','=','product.category_id')
//            ->where('product.status',true)
//            ->select(['product.*','categories.name as category_name'])
//            ->orderBy('id','desc')->paginate(20);
        $data = Product::with("Category")->Search($search)->CategoryFilter($category_id)->orderBy("id","desc")->paginate(20);
        return view("admin.product.list",[
            "data"=>$data,
            "categories"=>$categories
        ]);
    }

    public function createProduct(){
        $categories = Category::all();
        return view("admin.product.create",compact("categories"));
    }

    public function store(Request $request){
        $request->validate([
           "name"=>"required|string|min:6",
            "price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:0",
            "category_id"=>"required",
            "thumbnail"=>"required|image|mimes:jpg,png,jpeg.gif"
        ],[
            "required"=>"Vui long nhap thong tin",
            "string"=>"Phai nhap 1 chuoi van ban",
            "min"=>"Phai nhap :attribute toi thieu :min",
            "mimes"=>"Nhap dung dinh dang anh"
        ]);
        try {
            $thumbnail = null;
            if ($request ->hasFile("thumbnail")){
                $file = $request->file("thumbnail");
                $fileName = time().$file->getClientOriginalName();

                $path = public_path("uploads");
                $file->move($path,$fileName);
                $thumbnail = "uploads/".$fileName;
            }

            $product= Product::create([
                "name"=>$request->get("name"),
                "price"=>$request->get("price"),
                "thumbnail"=>$thumbnail,
                "depcription"=>$request->get("depcription"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id"),
            ]);
            return redirect()->to("admin/product/list")->with("success","Them san pham thanh cong");
        }catch (\Exception $e){}
        return redirect()->back()->with("error","Them san pham khong thanh cong");
    }

    public function edit(Product $product){
//        $product = Product::find($id);
//        if ($product==null){
//           return abort(404);
//        }

//        $product = Product::findOrFail($id);

        $categories = Category::orderBy("name","asc")->get();


        return view("admin.product.edit",compact('categories','product'));
    }

    public function update(Product $product,Request $request){

        $request->validate([
            "name"=>"required|string|min:6",
            "price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:0",
            "category_id"=>"required",
            "thumbnail"=>"nullable|image|mimes:jpg,png,jpeg.gif"
        ],[
            "required"=>"Vui long nhap thong tin",
            "string"=>"Phai nhap 1 chuoi van ban",
            "min"=>"Phai nhap :attribute toi thieu :min",
            "mimes"=>"Nhap dung dinh dang anh"
        ]);

        $thumbnail = $product->thumbnail;
        if ($request ->hasFile("thumbnail")){
            $file = $request->file("thumbnail");
            $fileName = time().$file->getClientOriginalName();

            $path = public_path("uploads");
            $file->move($path,$fileName);
            $thumbnail = "/uploads/".$fileName;
        }
        $product->update([
            "name"=>$request->get("name"),
            "price"=>$request->get("price"),
            "thumbnail"=>$thumbnail,
            "depcription"=>$request->get("depcription"),
            "qty"=>$request->get("qty"),
            "category_id"=>$request->get("category_id"),
        ]);
        return redirect()->to("admin/product/list");
    }

    public function delete(Product $product){
        $product->delete();
        return redirect()->to("admin/product/list");
    }
}
