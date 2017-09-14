<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*Include php file with radio button elements*/
include(storage_path().'/php/q_elements.php');

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
            /*Loop through q_elements.php to create radio buttons columns in database*/
            $matrix1 = getMatrix1Elements();
            foreach($matrix1 as $mat=>$name){
                $table->integer($name);
            }
            $matrix2 = getMatrix2Elements();
            foreach($matrix2 as $mat=>$name){
                $table->integer($name);
            }
            $matrix3 = getMatrix3Elements();
            foreach($matrix3 as $mat=>$name){
                $table->integer($name);
            }
            $matrix4 = getMatrix4Elements();
            foreach($matrix4 as $mat=>$name){
                $table->integer($name);
            }
            $matrix5 = getMatrix5Elements();
            foreach($matrix5 as $mat=>$name){
                $table->integer($name);
            }
            $matrix6 = getMatrix6Elements();
            foreach($matrix6 as $mat=>$name){
                $table->integer($name);
            }
            $matrix7 = getMatrix7Elements();
            foreach($matrix7 as $mat=>$name){
                $table->integer($name);
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
            /*Create an array of all radio button columns to drop*/
            $matrix1 = getMatrix1Elements();
            $table->dropColumn($matrix1);
            $matrix2 = getMatrix2Elements();
            $table->dropColumn($matrix2);
            $matrix3 = getMatrix3Elements();
            $table->dropColumn($matrix3);
            $matrix4 = getMatrix4Elements();
            $table->dropColumn($matrix4);
            $matrix5 = getMatrix5Elements();
            $table->dropColumn($matrix5);
            $matrix6 = getMatrix6Elements();
            $table->dropColumn($matrix6);
            $matrix7 = getMatrix7Elements();
            $table->dropColumn($matrix7);
        });
    }
}
