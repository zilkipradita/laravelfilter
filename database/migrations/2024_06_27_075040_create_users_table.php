<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 25)->unique();
			$table->string('password', 100);
			$table->string('nama', 100);
			$table->string('telp', 20);
			$table->string('email', 50)->unique();
            $table->unsignedBigInteger('user_levels_id');
            $table->foreign('user_levels_id')->references('id')->on('user_levels');
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
};
