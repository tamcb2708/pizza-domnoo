<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PzOderDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pz-order-detail', function (Blueprint $table) {
            $table->increments('order_detail_id');
            $table->integer('order_code');
            $table->integer('product_id');
            $table->string('product_image');
            $table->string('product_name');
            $table->float('product_price');
            $table->integer('product_quanty');
            $table->integer('product_size');
            $table->integer('product_base');
            $table->integer('product_rim');
            $table->integer('product_extra');
            $table->string('product_coupon');
            $table->string('product_freeship');
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
        Schema::dropIfExists('pz-order-detail');
    }
}
