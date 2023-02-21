<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oder', function (Blueprint $table) {
            $table->id();
            $table->date('oder_date');
            $table->string("fist_name");
            $table->string("last_name");
            $table->string("country");
            $table->string("city");
            $table->string("state");
            $table->string("postcode");
            $table->string('shipping_address');
            $table->string('customer_tel');
            $table->string('email');
            $table->string('notes');
            $table->unsignedDecimal('grand_total',12,4)->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oder');
    }
}
