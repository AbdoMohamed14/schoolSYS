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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('blood')->nullable();
            $table->string('image')->nullable();
            $table->string('religion');
            $table->string('address');
            $table->bigInteger('stage_id');
            $table->bigInteger('stage_class_id');
            $table->bigInteger('classroom_id');
            $table->string('parent_name_ar');
            $table->string('parent_name_en');
            $table->string('parent_phone');
            $table->string('parent_blood');
            $table->string('parent_address');
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
        Schema::dropIfExists('students');
    }
};
