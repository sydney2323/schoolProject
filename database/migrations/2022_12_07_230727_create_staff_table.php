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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->integer('staff_id')->unique();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('email')->unique();
            $table->string('contact');
            $table->string('about')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->integer('is_admin')->default(0);
            $table->string('password');
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
        Schema::dropIfExists('staff');
    }
};
