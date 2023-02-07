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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('academic_year');
            $table->string('reg_no');
            $table->string('staff_id');
            $table->string('module_id');
            $table->string('cat_1')->default(0);;
            $table->string('cat_2')->default(0);;
            $table->string('assignment_1')->default(0);;
            $table->string('assignment_2')->default(0);;
            $table->string('final_exam')->default(0);
            $table->string('score')->default(0);
            $table->string('grade')->nullable();
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
        Schema::dropIfExists('results');
    }
};
