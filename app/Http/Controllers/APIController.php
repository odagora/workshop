<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Make;
use App\Type;

class APIController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getMakes() {
        $data = Make::get();
        return response()->json($data);
    }

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getTypes(Request $request) {
        $data = Type::where('make_id', $request->make_id)->get();
        return response()->json($data);
    }
}
