<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name', 200)->nullable();
            $table->string('code',200)->nullable();
            $table->string('category',200)->nullable();
            $table->string('color',200)->nullable();
            $table->float('size')->nullable();
            $table->float('weight')->nullable();
            $table->string('sku', 200)->nullable();
            $table->string('manufacturer', 200)->nullable();
            $table->string('discontinued', 200)->nullable();
            $table->string('assigned_to', 200)->nullable();
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
