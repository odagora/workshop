<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCarTypeForeignColumnAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_type', function (Blueprint $table) {
            $table->integer('make_id', false, true)->length(10)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_type', function (Blueprint $table) {
            $table->integer('make_id', false, false)->length(11)->change();
        });
    }
}
