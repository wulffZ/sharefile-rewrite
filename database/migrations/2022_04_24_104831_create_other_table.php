<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('title');
            $table->longText("description");
            $table->string("file_extension")->nullable();
            $table->string('size');
            $table->string('file_uri');
            $table->string('thumbnail_uri');
            $table->string('soft_delete');
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
        Schema::dropIfExists('other');
    }
}