<?php

class Users extends Controller {

	function index() {

		$header['title'] 	= 'MASKA | USUARIOS';

		$usersModel = $this->loadModel('UsersModel');
		$data['users'] = $usersModel->getAll();

		$this->loadView('layout/header', 	$header);
		$this->loadView('layout/menu');
		$this->loadView('users/index', $data);
		$this->loadView('layout/footer');
	}
	
	function add() {
		
		$header['title'] = 'MASKA | INCLUIR USUARIO';
		
		$this->loadView('layout/header', 	$header);
		$this->loadView('layout/menu');
		$this->loadView('users/add');
		$this->loadView('layout/footer');
		
	}
	
	function edit() {
		
		$header['title'] = 'MASKA | ATUALIZAR USUARIO';
		
		$usersModel = $this->loadModel('UsersModel');
		$data['users'] = $usersModel->getAll();
		
		$this->loadView('layout/header', 	$header);
		$this->loadView('layout/menu');
		$this->loadView('users/edit', $data);
		$this->loadView('layout/footer');
		
	}
	
	function delete(){
		
		$header['title'] = 'MASKA | DELETAR USUARIO';
		
		$this->loadView('layout/header', 	$header);
		$this->loadView('layout/menu');
		$this->loadView('users/delete');
		$this->loadView('layout/footer');
		
	}

}