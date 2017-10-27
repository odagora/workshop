<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Controller;

use App\Make;
use App\Type;

class DropDownController extends Controller
{
    /**
     * Show the application layout
     *
     * @return \Illuminate\Http\Response
     */
    public function makes()
    {
        $makes = Make::all();
        return view('qdocs.create', compact('makes'));
    }

    /**
     * Get make types.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function types($id)
    {
        // Get the types fot the selected make 
        return Type::whereMakeId($id)->get();
    } 
}
