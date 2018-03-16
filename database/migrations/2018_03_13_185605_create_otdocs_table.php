<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtdocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otdocs', function (Blueprint $table){
            $table->increments('id');
            $table->integer('id_number')->unsigned();
            $table->string('c_firstname', 32);
            $table->string('c_lastname', 32);
            $table->char('license', 6);
            $table->integer('mileage')->unsigned();
            $table->integer('ordernumber')->unsigned()->unique();
            $table->string('status');
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
        Schema::dropIfExists('otdocs');
    }
}
