<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('servicer_id')->nullable()->default(0);
            $table->string('brand');
            $table->string('car_model');
            $table->integer('horse_power');
            $table->integer('engine_capacity');
            $table->string('car_body');
            $table->integer('repair_id')->nullable()->default(0);
            $table->integer('sell_id')->nullable()->default(0);
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
        Schema::dropIfExists('cars');
    }
}
