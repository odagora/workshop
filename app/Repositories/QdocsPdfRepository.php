<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Config;
use App\Make;
use App\Type;
use App\Qdocs;

trait QdocsPdfRepository {

	public function printQdocsPdf($id){

		$qdoc = Qdocs::find($id);
                $make = Make::find($qdoc->make);
                $type = Type::find($qdoc->type);
                $license = Qdocs::find($qdoc->license);
                $names = Config::get('constants.qdoc_names');
                $items = Config::get('constants.qdoc_items');
                $cats = Config::get('constants.qdoc_cats');
                $elements = Config::get('constants.qdoc_elements');
                $comments = Config::get('constants.qdoc_comments');
                $doc = $qdoc->doc_number + 1115;
		$pdf = \PDF::loadView('qdocs.pdf', compact('qdoc', 'make', 'type', 'names', 'items', 'cats', 'elements', 'comments','doc'))->setPaper('Letter')->setOption('zoom', 1.3)->setOption('margin-left', 6)->setOption('margin-right', 6)->setOption('footer-spacing', 2)->setOption('footer-left', "[doctitle] | Impreso el: [date]")->setOption('footer-right', "Pagina [page] de [toPage]")->setOption('footer-font-size', 7);

		return $pdf;
	}
}