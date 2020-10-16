<?php 

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct(){
		// $this->isLoggedIn = session()->get('isLoggedIn');		
		
		// if (!session()->has('isLoggedIn')){
		// 	session()->setFlashdata('errors', 'Silahkan Login Dulu !');
		// 	return redirect()->to('/auth/index');		
		// }
	}

	public function index()
	{
		echo view('pages/dashboard');
	}
}
