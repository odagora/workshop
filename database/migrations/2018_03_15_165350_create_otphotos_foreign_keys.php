<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtphotosForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('otphotos', function(Blueprint $table) {
            $table->foreign('doc_id')->references('id')->on('otdocs')
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
        Schema::table('otphotos', function(Blueprint $table) {
            $table->dropForeign('otphotos_doc_id_foreign');
        });
    }
}
