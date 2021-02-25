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
            $table->id('cd_subcategory');
            $table->unsignedBigInteger('cd_category');
            $table->foreign('cd_category')->references('cd_category')->on('tb_category');
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
