<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned();
	    $table->integer('category_id')->unsigned();
	    
	    $table->foreign('post_id')->references('id')->on('posts');
	    $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('category_post', function(Blueprint $table) {
	    $table->dropforeign('category_post_post_id_foreign');
	    $table->dropforeign('category_post_category_id_foreign');
	});
	Schema::dropIfExists('category_post');
    }
}
