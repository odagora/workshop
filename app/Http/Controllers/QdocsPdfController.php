<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\QdocsPdfRepository;
use App\Qdocs;

class QdocsPdfController extends Controller
{
        use QdocsPdfRepository;
    
        public function __construct()
        {
                $this->middleware('auth');
        }

        public function getQdocsPdf ($id)
        {
                $qdoc = Qdocs::find($id);
                $date = date('dmY', strtotime($qdoc->created_at));
                $filename = $qdoc->id.'_'.$qdoc->license.'_'.$date.'.pdf';
                $path = storage_path('static/'.$filename);
                //Save file to storage folder
                $this->printQdocsPdf($id)->save($path, true);

                //Download file saved in storage
                return \Response::download($path);
        }

}
