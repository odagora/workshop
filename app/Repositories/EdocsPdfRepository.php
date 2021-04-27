<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Make;
use App\Type;
use App\Edocs;

trait EdocsPdfRepository {

        public function printEdocsPdf($id){

                $edoc = Edocs::find($id);
                $make = Make::find($edoc->make);
                $type = Type::find($edoc->type);
                $license = Edocs::find($edoc->license);
                $names = Config::get('constants.edoc_names');
                $items = Config::get('constants.edoc_items');
                $cats = Config::get('constants.edoc_cats');
                $elements = Config::get('constants.edoc_elements');
                $comments = Config::get('constants.edoc_comments');
                $doc = $edoc->doc_number + 2024;
                $pdf = \PDF::loadView('edocs.pdf', compact('edoc', 'make', 'type', 'names', 'items', 'cats', 'elements', 'comments','doc'))->setPaper('Letter')->setOption('zoom', 1.28)->setOption('margin-top', 4)->setOption('margin-left', 6)->setOption('margin-right', 6)->setOption('footer-spacing', 2)->setOption('footer-left', "[doctitle] | Impreso el: [date]")->setOption('footer-right', "Pagina [page] de [toPage]")->setOption('footer-font-size', 7);

                return $pdf;
        }
}
