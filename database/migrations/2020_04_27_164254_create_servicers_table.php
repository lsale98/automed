<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicers', function (Blueprint $table) {
            $table->id();
            $table->string('owner_name');
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('type_of_service');
            $table->string('number');
            $table->string('cover_image');
            $table->string('password');
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
        Schema::dropIfExists('servicers');
    }
}
