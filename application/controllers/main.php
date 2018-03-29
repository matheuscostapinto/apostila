<?php

class Main extends Controller {

	function index()
	{
		
		$header['title'] 	= 'Apostila';
		$main['welcome']   	= 'Bem Vindo';
		
		$this->loadView('layout/header', 	$header);
		$this->loadView('main/index', 	$main);
		$this->loadView('layout/footer');
	}

}

?>
