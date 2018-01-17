<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EdocsPdfRepository;
use App\Edocs;

class EdocsPdfController extends Controller
{
    use EdocsPdfRepository;
    
        public function __construct()
        {
                $this->middleware('auth');
        }

        public function getEdocsPdf ($id)
        {
                $edoc = Edocs::find($id);
                $date = date('dmY', strtotime($edoc->created_at));
                $doc = $edoc->doc_number + 2024;
                $filename = $doc.'_'.$edoc->license.'_'.$date.'.pdf';
                $path = storage_path('app/'.$filename);
                //Save file to storage folder
                $this->printEdocsPdf($id)->save($path, true);

                //Download file saved in storage
                return \Response::download($path);
        }
}
