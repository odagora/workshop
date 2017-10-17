<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyColumnsAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qdocs', function (Blueprint $table) {
            $table->string('comment1', 500)->nullable()->change();
            $table->string('comment2', 500)->nullable()->change();
            $table->string('comment3', 500)->nullable()->change();
            $table->string('comment4', 500)->nullable()->change();
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
            $table->string('comment1', 500)->nullable(false)->change();
            $table->string('comment2', 500)->nullable(false)->change();
            $table->string('comment3', 500)->nullable(false)->change();
            $table->string('comment4', 500)->nullable(false)->change();
        });
    }
}
