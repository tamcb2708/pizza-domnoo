<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PzAgent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pz-agent', function (Blueprint $table) {
            $table->increments('ag_id');
            $table->string('ag_name');
            $table->string('ag_address');
            $table->integer('ag_status');
            $table->string('ag_old');
            $table->string('ag_phone');
            $table->string('ag_facebook');
            $table->string('ag_twitters');
            $table->string('ag_google');
            $table->string('ag_img');
            $table->string('ag_instar');
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
        Schema::dropIfExists('pz-agent');
    }
}
