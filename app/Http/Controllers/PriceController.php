<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Make;

class PriceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the price information for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $makes = Make::all();
        return view('pages.prices');
    }
}
