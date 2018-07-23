<?php

class Conteudo extends Controller {

	function index() {

		$header['title'] = 'MASKA | USUARIOS';

		$userId = $_SESSION['auth'][0]['id'];
		$ConteudoModel = $this->loadModel('ConteudoModel');
		$data['users'] = $ConteudoModel->getAll($userId);
		
		if( !empty($_SESSION['mensagem'])){
			$data['mensagem'] = $_SESSION['mensagem'];
			$data['tipoMensagem'] =  $_SESSION['tipoMensagem'];
			unset($_SESSION['mensagem']);
		}

		$this->loadView('layout/header', $header);
		$this->loadView('layout/menu');
		$this->loadView('conteudo/index', $data);
		$this->loadView('layout/footer');
	}
	
	function add() {
		
		$header['title'] = 'MASKA | INCLUIR USUARIO';
		
		if(isset($_POST['idConfirmar'])){
			$userId = $_SESSION['auth'][0]['id'];
			$usersModel = $this->loadModel('ConteudoModel');
			$retorno = $usersModel->SetCreate($userId,$_POST['conteudo']);
			
			global $config;
			header('location: '. $config['base_url'] .'/conteudo/index');			
			
		}

		$this->loadView('layout/header', $header);
		$this->loadView('layout/menu');
		$this->loadView('conteudo/add');
		$this->loadView('layout/footer');

	}

	function edit($id) {
		$data = array();
		
		$header['title'] = 'MASKA | ATUALIZAR USUARIO';
		
		$usersModel = $this->loadModel('ConteudoModel');
		
		if(isset($_POST['idConfirmar']) && $_POST['idConfirmar'] != null ){
			
			$atualizar = $usersModel->SetUpdate($id,$_POST['conteudo']);
			
			$data['conteudo'] = $_POST['conteudo'];
			
			global $config;
			header('location: '. $config['base_url'] .'/conteudo/index');
			
			
		} else{
			$result = $usersModel->getById($id);
			if(count($result)){
				$data= $result[0];
			}
		}

		$this->loadView('layout/header', $header);
		$this->loadView('layout/menu');
		$this->loadView('conteudo/edit', $data);
		$this->loadView('layout/footer');

	}

	function delete($id){

		$header['title'] = 'MASKA | DELETAR USUARIO';

		if(isset($_POST['idConfirmar']) && $_POST['idConfirmar'] != null ){

			$usersModel = $this->loadModel('ConteudoModel');
			$retorno = $usersModel->SetDelete($id);
			if(count($retorno)){
				$_SESSION['mensagem'] = 'Apagado registro '.$id;
				$_SESSION['tipoMensagem'] = 'success';
			}else{
				$_SESSION['mensagem'] = 'Não foi excluido o registro '.$id;
				$_SESSION['tipoMensagem'] = 'danger';
			}

			global $config;
			header('location: '. $config['base_url'] .'/conteudo/index');
		}else{
			$data['id'] = $id;
		}
		
		$this->loadView('layout/header', $header);
		$this->loadView('layout/menu');
		$this->loadView('conteudo/delete',$data);
		$this->loadView('layout/footer');
		
	}

}