<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('shop_id');
                $table->unsignedBigInteger('category_id');
                $table->unsignedBigInteger('material_id');
                $table->string('name');
                $table->integer('price');
                $table->string('weight')->nullable();
                $table->string('description')->nullable();
                $table->timestamps();

                $table->foreign('shop_id')->references('id')->on('shops');
                $table->foreign('category_id')->references('id')->on('categories');
                $table->foreign('material_id')->references('id')->on('materials');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
