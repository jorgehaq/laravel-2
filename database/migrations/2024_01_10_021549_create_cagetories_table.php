<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCagetoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cagetories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug");
            $table->longText("descripcion");
            $table->tinyInteger('numbers')->default("0");
            $table->tinyInteger('popular')->default("0");
            $table->string("meta_title");
            $table->string("meta_descrip");
            $table->string("meta_keywords");
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
        Schema::dropIfExists('cagetories');
    }
}
