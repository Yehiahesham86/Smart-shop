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
        Schema::create('home_dbs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('section_name');
            $table->string('photo_path');
            $table->string('background_path')->nullable();
            $table->string('headtitle');
            $table->longText('discription');
            $table->longText('note');

            $table->DECIMAL('price');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('categories_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('home_dbs');
    }
};
