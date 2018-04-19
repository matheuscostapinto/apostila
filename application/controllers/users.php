<?php

class Users extends Controller {

	function index() {

		$header['title'] = 'MASKA | USUARIOS';

		$usersModel = $this->loadModel('UsersModel');
		$data['users'] = $usersModel->getAll();
		
		if( !empty($_SESSION['mensagem'])){
			$data['mensagem'] = $_SESSION['mensagem'];
			$data['tipoMensagem'] =  $_SESSION['tipoMensagem'];
			unset($_SESSION['mensagem']);
		}

		$this->loadView('layout/header', $header);
		$this->loadView('layout/menu');
		$this->loadView('users/index', $data);
		$this->loadView('layout/footer');
	}
	
	function add() {
		
		$header['title'] = 'MASKA | INCLUIR USUARIO';
		
		if(isset($_POST['idConfirmar'])){
			
			$usersModel = $this->loadModel('UsersModel');
			$retorno = $usersModel->SetCreate($_POST['idNome'],$_POST['idUsuario'],$_POST['idSenha']);
			
			global $config;
			header('location: '. $config['base_url'] .'/users/index');			
			
		}

		$this->loadView('layout/header', $header);
		$this->loadView('layout/menu');
		$this->loadView('users/add');
		$this->loadView('layout/footer');

	}

	function edit($id) {
		$data = array();
		
		$header['title'] = 'MASKA | ATUALIZAR USUARIO';
		
		$usersModel = $this->loadModel('UsersModel');
		
		if(isset($_POST['idConfirmar']) && $_POST['idConfirmar'] != null ){
			
			$atualizar = null;
			if(isset($_POST['idSenha'])){
				$atualizar = $usersModel->SetUpdate($id,$_POST['idNome'],$_POST['idUsuario'],$_POST['idSenha']);
			}else{
				$atualizar = $usersModel->SetUpdate($id,$_POST['idNome'],$_POST['idUsuario']);
			}
			
			$data['name'] = $_POST['idNome'];
			$data['email'] = $_POST['idUsuario'];
			$data['password'] = $_POST['idSenha'];
			
			global $config;
			header('location: '. $config['base_url'] .'/users/index');
			
			
		} else{
			$result = $usersModel->getById($id);
			if(count($result)){
				$data= $result[0];
				unset($data['password']);
			}
		}

		$this->loadView('layout/header', $header);
		$this->loadView('layout/menu');
		$this->loadView('users/edit', $data);
		$this->loadView('layout/footer');

	}

	function delete($id){

		$header['title'] = 'MASKA | DELETAR USUARIO';

		if(isset($_POST['idConfirmar']) && $_POST['idConfirmar'] != null ){

			$usersModel = $this->loadModel('UsersModel');
			$retorno = $usersModel->SetDelete($id);
			if(count($retorno)){
				$_SESSION['mensagem'] = 'Apagado registro '.$id;
				$_SESSION['tipoMensagem'] = 'success';
			}else{
				$_SESSION['mensagem'] = 'Não foi excluido o registro '.$id;
				$_SESSION['tipoMensagem'] = 'danger';
			}

			global $config;
			header('location: '. $config['base_url'] .'/users/index');
		}else{
			$data['id'] = $id;
		}
		
		$this->loadView('layout/header', $header);
		$this->loadView('layout/menu');
		$this->loadView('users/delete',$data);
		$this->loadView('layout/footer');
		
	}

}