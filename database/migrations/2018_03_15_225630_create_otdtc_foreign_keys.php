<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtdtcForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('otdtcs', function(Blueprint $table) {
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
        Schema::table('otdtcs', function(Blueprint $table) {
            $table->dropForeign('otdtcs_doc_id_foreign');
        });
    }
}
