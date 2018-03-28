<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
	    $table->increments('id');
            $table->string('title');
            $table->text('body');
	    $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
	    $table->string('cover_image');
            $table->timestamps();
	    
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 
	Schema::table('posts', function(Blueprint $table) {
	    $table->dropforeign('posts_created_by_foreign');
	    $table->dropforeign('posts_updated_by_foreign');
	});
        Schema::dropIfExists('posts');
    }
}
