<?php

class Main extends Controller {

	function index()
	{
		
		$header['title'] 	= 'Apostila';
		$main['welcome']   	= 'Bem Vindo';
		
		$this->loadView('header', 	$header);
		$this->loadView('main', 	$main);
		$this->loadView('footer');
	}

	function add()
	{
		
		$header['title'] 	= 'Apostila';
		$main['welcome']   	= 'ADicionar';
		
		$this->loadView('header', 	$header);
		$this->loadView('main', 	$main);
		$this->loadView('footer');
	}

}

?>
