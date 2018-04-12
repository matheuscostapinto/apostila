<?php

class Auth extends Controller {

	function login()
	{
		
		$header['title'] 	= 'Apostila | Login';
		$auth['login_text'] = 'Login';
		
		$this->loadView('layout/header', 	$header);
		$this->loadView('auth/index', 	$auth);
		$this->loadView('layout/footer');
	}
	
	function access(){
		global $config;
		
		$meumodel = $this->loadModel('users');
		
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		$result = $meumodel->GetAuth($email,$senha);
		print_r($result);
		if(count($result)>0){
			$_SESSION['auth'] = $result;
			header('location: ' . $config['base_url'] . 'dashboard/index');
		}else{
			echo 'tente novamente, senha ou usuario incorreto';
		}
	}

}

?>
