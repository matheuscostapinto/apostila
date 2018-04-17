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

}