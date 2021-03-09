<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PzImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pz-image', function (Blueprint $table) {
            $table->increments('im_id');
            $table->string('im_img1');
            $table->string('im_img2');
            $table->string('im_img3');
            $table->string('im_img4');
            $table->string('im_img5');
            $table->integer('im_prod')->unsigned();
            $table->foreign('im_prod')
                  ->references('pr_id')
                  ->on('pz-product')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('pz-image');
    }
}
