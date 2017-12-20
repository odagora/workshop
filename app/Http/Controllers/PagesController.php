<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function getIndex() {
		return view('pages.index');
	}

	public function getAdmin() {
		return view('pages.admin');
	}
}

?>