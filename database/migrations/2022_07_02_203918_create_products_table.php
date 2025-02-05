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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();

            $table->string('weight')->nullable();
            $table->string('price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('left_quantity')->nullable();

            $table->bigInteger('category_id')->unsigned();

            $table->text('description')->nullable();
            $table->text('usage')->nullable();
            $table->text('store')->nullable();
            $table->text('recipe')->nullable();

            $table->string('image')->nullable();
            $table->string('images')->nullable();
            $table->string('stauts')->default('0');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
