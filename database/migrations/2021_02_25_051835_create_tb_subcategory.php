<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSubcategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_subcategory', function (Blueprint $table) {
            $table->id('id_subcategory');
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id_category')->on('tb_category');
            $table->string('nm_title', 50);
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
        Schema::dropIfExists('tb_subcategory');
    }
}
