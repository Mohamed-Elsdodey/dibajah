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
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['color','select','text','checkbox'])->default('color');
            $table->string('name_ar',300)->nullable();
            $table->string('name_en',300)->nullable();
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `product_attributes` comment ' خصائص المنتجات العامة'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attributes');
    }
};
