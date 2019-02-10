<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('cid');
            $table->uuid('uid');
            $table->string('name')->nullable();   
            $table->string('url')->default('default.jpg');
            $table->longText('description')->nullable();
            $table->string('tags')->nullable();
            $table->unsignedInteger('typeofcmty')->default(1);
            $table->unsignedInteger('cndtion')->nullable();
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
        // Schema::dropIfExists('communities');
    }
}
