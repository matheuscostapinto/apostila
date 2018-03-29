<?php

abstract Controller {
	
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
