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
            $table->double('stock')->default(0);
            $table->string('status',1)->nullable();
            $table->string('back_order',1)->nullable();
            $table->string('featured',1)->nullable();
            $table->string('sku',50)->nullable();
            $table->string('main_image',500)->nullable();
            $table->string('shipping',500)->nullable();
            $table->double('weight')->nullable();
            $table->double('length')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->bigInteger('count_view')->nullable();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');

            $table->string('title_ar',500)->nullable();
            $table->string('title_en',500)->nullable();

            $table->string('brief_ar',500)->nullable();
            $table->string('brief_en',500)->nullable();

            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
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
};
