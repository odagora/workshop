<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

	public function getLogin() {
		# process variable data or params
		# talk to the model
		# receive from the model
		# compile or process data from the model if needed
		# pass that data to the correct view
		return view('pages.login');
	}

	public function getIndex() {
		return view('pages.index');
	}

	public function getSearch() {
		$first = 'Daniel';
		$last = 'González';
		$fullname = $first.' '.$last;
		$email = 'dgonzalez@servitalleres.com';
		$data['fullname']=$fullname;
		$data['email']=$email;
		return view('pages.search')->withData($data);
	}

	public function getProfile() {
		return view('pages.profile');
	}

	public function getConfig() {
		return view('pages.config');
	}

	public function getQuality() {
		return view('pages.quality');
	}

	public function getExpert() {
		return view('pages.expert');
	}

	public function getInspection() {
		return view('pages.inspection');
	}

	public function getCollision() {
		return view('pages.collision');
	}

	public function getPrint() {
		return view('pages.print');
	}

	public function getConfirm() {
		return view('pages.confirm');
	}
}

?>