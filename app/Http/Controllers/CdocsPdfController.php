<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\cdocsPdfRepository;
use App\Cdocs;

class CdocsPdfController extends Controller
{
    use CdocsPdfRepository;
    
        public function __construct()
        {
                $this->middleware('auth');
        }

        public function getCdocsPdf ($id)
        {
                $cdoc = Cdocs::find($id);
                $date = date('dmY', strtotime($cdoc->created_at));
                $filename = $cdoc->id.'_'.$cdoc->license.'_'.$date.'.pdf';
                $path = storage_path('static/'.$filename);
                //Save file to storage folder
                $this->printCdocsPdf($id)->save($path, true);

                //Download file saved in storage
                return \Response::download($path);
        }
}
