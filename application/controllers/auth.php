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
	
	function access(){
		
		$meumodel = $this->loadModel('users');
		
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		$result = $meumodel->GetAuth($email,$senha);
		if(count($result)>0){
			echo 'ACHOU alguem';
		}else{
			echo 'tente novamente, senha ou usuario incorreto';
		}
	}

}

?>
