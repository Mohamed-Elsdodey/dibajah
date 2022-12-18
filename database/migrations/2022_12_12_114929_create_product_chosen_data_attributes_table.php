<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_chosen_data_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('product_attribute_id')->comment('جدول الخصائص العام')->nullable();
            $table->foreign('product_attribute_id')->references('id')
                ->on('product_attributes')->onDelete('cascade');


            $table->unsignedBigInteger('product_chosen_attr_id')->comment('خصائص المنتجات المختارة')->nullable();
            $table->foreign('product_chosen_attr_id')->references('id')
                ->on('product_chosen_attributes')->onDelete('cascade');

            $table->string('value_ar',300)->nullable();
            $table->string('value_en',300)->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `product_chosen_data_attributes` comment 'قيم خصائص المنتجات المختاره'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_chosen_data_attributes');
    }
};
