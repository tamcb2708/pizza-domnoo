<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PzBlog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pz-blog', function (Blueprint $table) {
            $table->increments('bl_id');
            $table->string('bl_name');
            $table->integer('bl_view');
            $table->text('bl_title');
            $table->string('bl_img1'); 
            $table->string('bl_img2');
            $table->string('bl_img3');
            $table->text('bl_desc1');
            $table->text('bl_desc2');
            $table->text('bl_desc3');
            $table->text('bl_desc4');
            $table->text('bl_desc5');
            $table->string('bl_author');
            $table->integer('bl_status');
            $table->integer('bl_comment');
            $table->integer('bl_cate')->unsigned();
            $table->foreign('bl_cate')
                  ->references('ca_id')
                  ->on('pz-cate')
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
        Schema::dropIfExists('pz-blog');
    }
}
