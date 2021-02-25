<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_product', function (Blueprint $table) {
            $table->id('cd_product');
            $table->unsignedBigInteger('cd_category');
            $table->foreign('cd_category')->references('cd_category')->on('tb_category');
            $table->unsignedBigInteger('cd_subcategory');
            $table->foreign('cd_subcategory')->references('cd_subcategory')->on('tb_subcategory');
            $table->string('nm_title', 50);
            $table->string('nm_description', 200);
            $table->string('nm_image', 100);
            $table->decimal('vl_product', 6, 2);
            $table->string('nm_tag', 100)->nullable();
            $table->char('ic_status', 1)->default('A');
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
        Schema::dropIfExists('tb_product');
    }
}
