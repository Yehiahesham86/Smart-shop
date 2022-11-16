<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->timestamps();
            $table->string('name');
            $table->string('cover_path');
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->longText('discription');
            $table->double('price');
            $table->double('rate');
            $table->double('discount');
            $table->unsignedBigInteger('brand')->nullable();
            $table->foreign('brand')->references('id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('pop');
            $table->integer('avalability');
            $table->string('type');
            $table->string('color');



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
};
