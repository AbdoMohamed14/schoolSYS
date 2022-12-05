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
        Schema::create('session_tables', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('first_session');
            $table->string('second_session');
            $table->string('third_session');
            $table->string('fourth_session');
            $table->string('fifth_session');
            $table->bigInteger('classroom');
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
        Schema::dropIfExists('session_tables');
    }
};
