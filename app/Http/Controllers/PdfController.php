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
                $license = Qdocs::find($qdoc->license);
                $names = Config::get('constants.qdoc_names');
                $items = Config::get('constants.qdoc_items');
                $cats = Config::get('constants.qdoc_cats');
                $elements = Config::get('constants.qdoc_elements');
                $comments = Config::get('constants.qdoc_comments');
                $date = date('dmY', strtotime($qdoc->created_at));
                $filename = $qdoc->id.'_'.$qdoc->license.'_'.$date.'.pdf';
                $path = storage_path('static/'.$filename);
        	$pdf = \PDF::loadView('qdocs.pdf', compact('qdoc', 'make', 'type', 'names', 'items', 'cats', 'elements', 'comments'))->setPaper('Letter')->setOption('margin-left', 6)->setOption('margin-right', 6)->setOption('footer-spacing', 2)->setOption('footer-left', "[doctitle] | Impreso el: [date]")->setOption('footer-right', "Pagina [page] de [toPage]")->setOption('footer-font-size', 7);

                //Save file to storage folder
                $pdf->save($path, true);

                //Download file saved in storage
                return \Response::download($path);
        }

}
