<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMakeTypeForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('car_type', function(Blueprint $table) {
            $table->foreign('make_id')->references('id')->on('car_make')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_type', function(Blueprint $table) {
            if(env('DB_CONNECTION') !== 'sqlite'){
                $table->dropForeign('car_type_make_id_foreign');
            }
        });
    }
}
