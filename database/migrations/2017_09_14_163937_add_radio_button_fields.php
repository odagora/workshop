<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;


class AddRadioButtonFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qdocs', function (Blueprint $table) {
            /*Loop through matrix elements to create radio buttons columns in database*/
            $names = Config::get('constants.qdoc_names');
            $elements = Config::get('constants.qdoc_elements');
            foreach ($names as $key => $value) {
                foreach ($elements[$key] as $mat => $name) {
                    $table->integer($name);            
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qdocs', function (Blueprint $table) {
            $names = Config::get('constants.qdoc_names');
            $elements = Config::get('constants.qdoc_elements');
            foreach ($names as $key => $value) {
                $table->dropColumn($elements[$key]);
            }
        });
    }
}
