<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->unsignedBigInteger('oder_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedDecimal('price',12,4);
            $table->unsignedInteger('qty');
            $table->timestamps();
            $table->foreign('oder_id')->references('id')->on('oder');
            $table->foreign('product_id')->references('id')->on('product');
            $table->unique(['oder_id','product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
