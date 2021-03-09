<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PzHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pz-history', function (Blueprint $table) {
            $table->increments('hi_id');
            $table->string('hi_img');
            $table->string('hi_time');
            $table->integer('hi_status');
            $table->string('hi_title');
            $table->string('hi_desc1');
            $table->string('hi_desc2');
            $table->string('hi_desc3');
            $table->string('hi_desc4');
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
        Schema::dropIfExists('pz-history');
    }
}
