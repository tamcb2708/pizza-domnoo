<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PzProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pz-product', function (Blueprint $table) {
            $table->increments('pr_id');
            $table->string('pr_name');
            $table->integer('pr_sold');
            $table->integer('pr_view');
            $table->string('pr_element');
            $table->integer('pr_price');
            $table->integer('pr_pricenew');
            $table->string('pr_img');
            $table->integer('pr_status');
            $table->text('pr_desc1');
            $table->text('pr_desc2');
            $table->text('pr_desc3');
            $table->text('pr_more');
            $table->integer('pr_pizza');
            $table->integer('pr_cate')->unsigned();
            $table->foreign('pr_cate')
                  ->references('cate_id')
                  ->on('pz-category')
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
        Schema::dropIfExists('pz-product');
    }
}
