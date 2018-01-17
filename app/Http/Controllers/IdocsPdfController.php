<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\IdocsPdfRepository;
use App\Idocs;

class IdocsPdfController extends Controller
{
    use IdocsPdfRepository;
    
        public function __construct()
        {
                $this->middleware('auth');
        }

        public function getIdocsPdf ($id)
        {
                $idoc = Idocs::find($id);
                $date = date('dmY', strtotime($idoc->created_at));
                $doc = $idoc->doc_number + 3012;
                $filename = $doc.'_'.$idoc->license.'_'.$date.'.pdf';
                $path = storage_path('app/'.$filename);
                //Save file to storage folder
                $this->printIdocsPdf($id)->save($path, true);

                //Download file saved in storage
                return \Response::download($path);
        }
}
