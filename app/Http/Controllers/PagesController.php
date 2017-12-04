<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	public function getIndex() {
		return view('pages.index');
	}

	public function getProfile() {
		return view('pages.profile');
	}

	public function getConfig() {
		return view('pages.config');
	}
}

?>