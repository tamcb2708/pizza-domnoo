<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PzCoupon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pz-coupon', function (Blueprint $table) {
            $table->Increments('con_id');
            $table->string('con_name');
            $table->string('con_code');
            $table->Integer('con_number');
            $table->Integer('con_condition');
            $table->Integer('con_time');
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
        Schema::dropIfExists('pz-coupon');
    }
}
