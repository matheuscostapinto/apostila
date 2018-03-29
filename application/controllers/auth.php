<?php

class Auth extends Controller {

	function index()
	{
		
		$header['title'] 	= 'Apostila | Login';
		$auth['login_text']   	= 'Login';
		
		$this->loadView('layout/header', 	$header);
		$this->loadView('auth/index', 	$auth);
		$this->loadView('layout/footer');
	}
	
	function autenthicator{
		$this->loadModel('auth');
	}

}

?>
