<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class CreateIdocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idocs', function (Blueprint $table) {
            $names = Config::get('constants.idoc_names');
            $elements = Config::get('constants.idoc_elements');
            $table->increments('id');
            $table->string('e_firstname', 32);
            $table->string('e_lastname', 32);
            $table->string('c_firstname', 32);
            $table->string('c_lastname', 32);
            $table->integer('id_number')->unsigned();
            $table->bigInteger('phone');
            $table->string('email', 40);
            $table->string('make', 32);
            $table->string('type', 32);
            $table->integer('model')->unsigned();
            $table->char('license', 6);
            $table->integer('mileage')->unsigned();
            foreach ($names as $key => $value) {
                foreach ($elements[$key] as $mat => $name) {
                    $table->integer($name);
                }
            }
            $table->string('comment1', 400)->nullable();
            $table->string('comment2', 400)->nullable();
            $table->string('comment3', 400)->nullable();
            $table->string('comment4', 400)->nullable();
            $table->string('comment5', 400)->nullable();
            $table->text('e_signature', 500);
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
        Schema::dropIfExists('idocs');
    }
}
