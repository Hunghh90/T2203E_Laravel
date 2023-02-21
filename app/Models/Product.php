<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="product";

    protected $fillable = [
        'name',
        'price',
        'thumbnail',
        'qty',
        'status',
        'category_id'

        ];

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Order(){
        return $this->belongsToMany(Order::class,'order_products');
    }

    public function scopeSearch($query,$search){
        if($search && $search !=""){
            return $query->where("name",'like',"%$search%");
        }
        return $query;
    }
    public function scopeCategoryFilter($query,$category_id){
        if($category_id && $category_id !=0){
            return $query->where("category_id",$category_id);
        }
        return $query;
    }

//    public function scopeStatus($query $status){
//        if()
//    }
}
