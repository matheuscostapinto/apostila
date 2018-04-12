<?php

class Dashboard extends Controller {
	
	function index() {
		
		$header['title'] 	= 'MASKA';
		
		$this->loadView('layout/header', 	$header);
		$this->loadView('layout/menu');
		$this->loadView('dashboard/index');
		$this->loadView('layout/footer');
	}
	
	
	
	
	
	
}
