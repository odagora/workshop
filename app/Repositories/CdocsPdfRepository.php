<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Make;
use App\Type;
use App\Cdocs;

trait CdocsPdfRepository {

        public function printCdocsPdf($id){

                $cdoc = Cdocs::find($id);
                $make = Make::find($cdoc->make);
                $type = Type::find($cdoc->type);
                $license = Cdocs::find($cdoc->license);
                $doc = $cdoc->doc_number + 762;
                $pdf = \PDF::loadView('cdocs.pdf', compact('cdoc', 'make', 'type','doc'))->setPaper('Letter')->setOption('zoom', 1.28)->setOption('margin-top', 3)->setOption('margin-left', 6)->setOption('margin-right', 6)->setOption('footer-spacing', 2);

                return $pdf;
        }
}
