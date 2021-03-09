<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PzCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pz-customer', function (Blueprint $table) {
            $table->increments('cus_id');
            $table->string('cus_name');
            $table->string('cus_email');
            $table->string('cus_address');
            $table->integer('cus_phone');
            $table->string('cus_password');
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
        Schema::dropIfExists('pz-customer');
    }
}
