<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCdocsCphotosForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cphotos', function(Blueprint $table) {
            $table->foreign('doc_id')->references('id')->on('cdocs')
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
        Schema::table('cphotos', function(Blueprint $table) {
            $table->dropForeign('cphotos_doc_id_foreign');
        });
    }
}
