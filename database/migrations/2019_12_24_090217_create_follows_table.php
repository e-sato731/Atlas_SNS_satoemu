<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('user_id')->nullable();
            $table->string('username',255)->nullable();
            $table->string('following_id');
            $table->integer('followed_id');

            $table->unique(['following_id', 'followed_id']);
        });
    }


    public function down()
    {
        Schema::dropIfExists('follows');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

}
