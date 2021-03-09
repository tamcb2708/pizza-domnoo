<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PzFreeship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pz-freeship', function (Blueprint $table) {
            $table->increments('fre_id');
            $table->integer('fre_matp');
            $table->integer('fre_maqh');
            $table->integer('fre_xaid');
            $table->string('fre_ship');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pz-freeship');
    }
}
