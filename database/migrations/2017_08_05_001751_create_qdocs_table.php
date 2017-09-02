<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQdocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qdocs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordernumber')->unsigned()->unique();
            $table->string('e_firstname', 32);
            $table->string('e_lastname', 32);
            $table->string('c_firstname', 32);
            $table->string('c_lastname', 32);
            $table->string('email', 40);
            $table->string('make', 32);
            $table->string('type', 32);
            $table->integer('model')->unsigned();
            $table->char('license', 6);
            $table->integer('mileage')->unsigned()->unique();
            $table->string('comment1', 500);
            $table->string('comment2', 500);
            $table->string('comment3', 500);
            $table->string('comment4', 500);
            $table->integer('n_mileage')->unsigned()->unique();
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
        Schema::dropIfExists('qdocs');
    }
}
