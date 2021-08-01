<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mobile', 13)->unique();
            $table->string('email', 100)->unique();
            $table->string('name', 100);
            $table->string('password', 100);
            $table->enum('type', \App\User::TYPES)->default(\App\User::TYPE_USER);
            $table->string('avatar', 100)->nullable();
            $table->string('website')->nullable();
            $table->string('verify_code', 6)->nullable();
            $table->timestamp('verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
