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
            $table->uuid('pid');
            $table->uuid('uid');
            $table->string('url');
            $table->string('caption')->nullable();
            $table->smallInteger('type'); // { 0 => image , 1 => video }
            $table->smallInteger('view')->default(0); // { 0 => public , 1 => private  }
            $table->smallInteger('endis')->default(0); // { 0 => enable , 1 => disable  }
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
        Schema::dropIfExists('posts');
    }
}
