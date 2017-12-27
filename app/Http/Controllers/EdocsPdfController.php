<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\EdocsPdfRepository;
use App\Edocs;

// use Illuminate\Support\Facades\Config;
// use App\Make;
// use App\Type;

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
                $filename = $edoc->id.'_'.$edoc->license.'_'.$date.'.pdf';
                $path = storage_path('static/'.$filename);
                //Save file to storage folder
                $this->printEdocsPdf($id)->save($path, true);

                //Download file saved in storage
                return \Response::download($path);
        }
}
