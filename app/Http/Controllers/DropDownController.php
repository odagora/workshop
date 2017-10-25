<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class DropDownController extends Controller
{
    /**
     * Show the application layout
     *
     * @return \Illuminate\Http\Response
     */
    public function myform()
    {
        $makes = DB::table("makes")->pluck("name","id")->all();
        /*Allow select items when validation fails */
        $selectedMake = $this->myformAjax(Input::get('make'));
        return view('qdocs.create', compact('makes', 'selectedMake'));
    }

    /**
     * Get Ajax Request and return Data
     *
     * @return \Illuminate\Http\Response
     */
    public function myformAjax($id)
    {
        $types = DB::table("types")
                    ->where("make_id",$id)
                    ->pluck("name","id")->all();
        return json_encode($types);
    }
}
