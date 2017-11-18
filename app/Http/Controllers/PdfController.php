<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Make;
use App\Type;
use App\Qdocs;

class PdfController extends Controller
{
    
	public function getQdocsPdf ($id)
	{
		$qdoc = Qdocs::find($id);
        $make = Make::find($qdoc->make);
        $type = Type::find($qdoc->type);
        $names = Config::get('constants.qdoc_names');
        $items = Config::get('constants.qdoc_items');
        $cats = Config::get('constants.qdoc_cats');
        $elements = Config::get('constants.qdoc_elements');
        $comments = Config::get('constants.qdoc_comments');
		// return \PDF::loadView('qdocs.pdf', compact('qdoc', 'make', 'type', 'names', 'items', 'cats', 'elements', 'comments'))->setPaper('Letter')->stream('qdoc.pdf');
		return view('qdocs.pdf', compact('qdoc', 'make', 'type', 'names', 'items', 'cats', 'elements', 'comments'));
	}

}
