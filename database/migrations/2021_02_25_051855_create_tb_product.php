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
            $table->id('id_product');
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id_category')->on('tb_category');
            $table->unsignedBigInteger('id_subcategory');
            $table->foreign('id_subcategory')->references('id_subcategory')->on('tb_subcategory');
            $table->string('nm_title', 50);
            $table->string('ds_product', 1000);
            $table->string('nm_image')->nullable();
            $table->decimal('vl_product', 6, 2);
            $table->json('nm_tag')->nullable();
            $table->char('ck_status', 1)->default('A');
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
