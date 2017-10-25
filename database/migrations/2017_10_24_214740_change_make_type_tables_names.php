<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeMakeTypeTablesNames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $from = 'car_make';
        $to = 'makes';
        $from1 = 'car_type';
        $to1 = 'types';
        Schema::rename($from, $to);
        Schema::rename($from1, $to1);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $from = 'makes';
        $to = 'car_make';
        $from1 = 'types';
        $to1 = 'car_type';
        Schema::rename($from, $to);
        Schema::rename($from1, $to1);
    }
}
