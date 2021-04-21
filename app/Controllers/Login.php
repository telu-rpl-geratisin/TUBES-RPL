<?php

// this controller will redirect user to homepage with user type, handle by users/* controller.

// login needed to access user previleges

namespace App\Controllers;
use CodeIgniter\Controller;

class Login extends Controller {
	public function index() {
		$data['title'] = 'Login';

		echo view('templates/header', $data);
		echo view('pages/login');
		echo view('templates/footer');
	}
}