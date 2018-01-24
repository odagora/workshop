<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeQdocsTextareaMaxlength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qdocs', function (Blueprint $table) {
            $table->string('comment1', 450)->change();
            $table->string('comment2', 450)->change();
            $table->string('comment3', 450)->change();
            $table->string('comment4', 450)->change();
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
            $table->string('comment1', 500)->change();
            $table->string('comment2', 500)->change();
            $table->string('comment3', 500)->change();
            $table->string('comment4', 500)->change();
        });
    }
}
