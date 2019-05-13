<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchLib extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birdimage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('subclass');
            $table->integer('class_id');
            $table->string('file_path');
        });

        Schema::create('subclass', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('class_name');
            $table->integer('class_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('birdimage');
        Schema::dropIfExists('subclass');
    }
}
