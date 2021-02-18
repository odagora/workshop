<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cdocs', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('e_firstname', 32);
            $table->string('e_lastname', 32);
            $table->string('c_firstname', 32);
            $table->string('c_lastname', 32);
            $table->bigInteger('phone');
            $table->string('email', 40);
            $table->string('make', 32);
            $table->string('type', 32);
            $table->integer('model')->unsigned();
            $table->char('license', 6);
            $table->integer('mileage')->unsigned();
            $table->string('description', 288);
            $table->string('spare_parts', 3);
            $table->string('spare_description', 88)->nullable();
            $table->integer('price')->unsigned();
            $table->integer('time')->unsigned();
            $table->integer('validity_time')->unsigned();
            $table->string('observations', 300);
            $table->string('status')->nullable();
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
        Schema::dropIfExists('cdocs');
    }
}
