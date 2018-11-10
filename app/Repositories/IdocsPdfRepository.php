<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Make;
use App\Type;
use App\Idocs;

trait IdocsPdfRepository {

        public function printIdocsPdf($id){

                $idoc = Idocs::find($id);
                $make = Make::find($idoc->make);
                $type = Type::find($idoc->type);
                $license = Idocs::find($idoc->license);
                $names = Config::get('constants.idoc_names');
                $items = Config::get('constants.idoc_items');
                $cats = Config::get('constants.idoc_cats');
                $elements = Config::get('constants.idoc_elements');
                $comments = Config::get('constants.idoc_comments');
                $doc = $idoc->doc_number + 3012;
                $pdf = \PDF::loadView('idocs.pdf', compact('idoc', 'make', 'type', 'names', 'items', 'cats', 'elements', 'comments','doc'))->setPaper('Letter')->setOption('zoom', 1.3)->setOption('margin-top', 4)->setOption('margin-left', 6)->setOption('margin-right', 6)->setOption('footer-spacing', 2)->setOption('footer-left', "[doctitle] | Impreso el: [date]")->setOption('footer-right', "Pagina [page] de [toPage]")->setOption('footer-font-size', 7);

                return $pdf;
        }
}
