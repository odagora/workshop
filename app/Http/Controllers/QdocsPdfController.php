<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Repositories\QdocsPdfRepository;
use Illuminate\Support\Facades\Config;
use App\Make;
use App\Type;
use App\Qdocs;

class QdocsPdfController extends Controller
{
        // use QdocsPdfRepository;
    
        public function __construct()
        {
                $this->middleware('auth');
        }

        public function getQdocsPdf ($id)
        {
                $qdoc = Qdocs::find($id);
                $make = Make::find($qdoc->make);
                $type = Type::find($qdoc->type);
                $license = Qdocs::find($qdoc->license);
                $names = Config::get('constants.qdoc_names');
                $items = Config::get('constants.qdoc_items');
                $cats = Config::get('constants.qdoc_cats');
                $elements = Config::get('constants.qdoc_elements');
                $comments = Config::get('constants.qdoc_comments');
                $date = date('dmY', strtotime($qdoc->created_at));
                $doc = $qdoc->doc_number + 1115;
                $filename = $doc.'_'.$qdoc->license.'_'.$date.'.pdf';
                $path = storage_path('app/'.$filename);
                //Save file to storage folder
                // $this->printQdocsPdf($id)->save($path, true);

                //Download file saved in storage
                // return \Response::download($path);
                return view('qdocs.pdf', compact('qdoc', 'make', 'type', 'names', 'items', 'cats', 'elements', 'comments','doc'));
        }

}
