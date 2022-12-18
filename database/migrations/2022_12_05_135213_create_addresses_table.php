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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')
                ->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id')->references('id')
                ->on('areas')->onDelete('cascade');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')
                ->on('cities')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');

            $table->string('street',500)->nullable();
            $table->string('apartment_num',500)->nullable();
            $table->string('region',500)->nullable();
            $table->string('postal_code',50)->nullable();
            $table->string('phone',50)->nullable();
            $table->string('default',1)->nullable();

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
        Schema::dropIfExists('addresses');
    }
};
