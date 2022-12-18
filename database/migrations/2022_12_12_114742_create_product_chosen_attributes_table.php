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
        Schema::create('product_chosen_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')
                ->on('products')->onDelete('cascade');

            $table->unsignedBigInteger('product_attribute_id')->comment('جدول الخصائص العام')->nullable();
            $table->foreign('product_attribute_id')->references('id')
                ->on('product_attributes')->onDelete('cascade');

            $table->timestamps();
        });
        DB::statement("ALTER TABLE `product_chosen_attributes` comment 'خصائص المنتجات المختارة'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_chosen_attributes');
    }
};
