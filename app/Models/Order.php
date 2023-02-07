<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="oder";

    protected $fillable = [
        'oder_date',
        'grand_total',
        'shipping_address',
        'customer_tel',
        'status'
    ];
}

