<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_to_users', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uidone');
            $table->uuid('uidtwo');
            $table->unsignedInteger('status'); // {'0'=>'fiend','1'=>'pendind','2'=>'accepted'}
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
        Schema::dropIfExists('user_to_users');
    }
}
