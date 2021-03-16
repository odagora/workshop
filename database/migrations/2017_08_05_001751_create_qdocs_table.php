<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

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
            $names = Config::get('constants.qdoc_names');
            $elements = Config::get('constants.qdoc_elements');
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
            foreach ($names as $key => $value) {
                foreach ($elements[$key] as $mat => $name) {
                    $table->integer($name);
                }
            }
            $table->string('comment1', 500)->nullable();
            $table->string('comment2', 500)->nullable();
            $table->string('comment3', 500)->nullable();
            $table->string('comment4', 500)->nullable();
            $table->integer('n_mileage')->unsigned()->unique();
            $table->text('e_signature');
            $table->text('c_signature')->nullable();
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
