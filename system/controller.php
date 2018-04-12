<?php

abstract class Controller {
	
	public function __construct(){
		global $config;
		global $route;
		
		print_r($route);
		die('oi');
		$auth = $_SESSION['auth']['email'] ?? null;
		
		if(!$auth && !in_array( $route['controller_atual'].'/'.$route['method_atual'] , $config['whitelist']) ){
			header('location: ' . $config['base_url'] . 'auth/login');
		}
	}
	
	public function loadModel($name)
	{
		require(MASKA_APP .'models/'. strtolower($name) .'.php');

		$model = new $name;
		return $model;
	}
	
	public function loadView($name, $data = [])
	{
		$view = new View($name, $data);
		return $view;
	}
	
	public function loadHelper($name)
	{
		require(MASKA_APP .'helpers/'. strtolower($name) .'.php');
		$helper = new $name;
		return $helper;
	}
	
	public function redirect($loc)
	{
		global $config;
		
		header('Location: '. $config['base_url'] . $loc);
	}
    
}
