<?php

class System
{
	/**
		* Nome do Controlador
		*/
	protected $controller;
	/**
		* Nome da Método do Controlador
		*/
	protected $method;
	/**
		* Paramentros adicionais
		*/
	protected $param;

	/**
		* Construtor
		*/
	public function __construct() 
	{
		/**
			* Declara uma Váriavel Global
			*/
		global $route;

		/**
			* Define controlador padrão
			* MAIN
			*/
		$this->controller 		= $route['default_controller'];
		/**
			* Define método padrão
			* INDEX
			*/
		$this->method 			= 'index';
		/**
			* Define parametros como vazio
			*/
		$this->param 			= [];

		if(isset($_GET['url']))
			$url = $this->parseUrl($_GET['url']);
		else
			$url[0]=$route['default_controller'];

		if(file_exists(MASKA_APP.'controllers/'.$url[0].'.php'))
		{
			$this->controller 	= $url[0];
			unset($url[0]);
		}
		elseif(!file_exists(MASKA_APP.'controllers/'.$url[0].'.php') and $url[0] != '')
		{
			$this->controller 	= $route['error_controller'];
			unset($url[0]);
		}
		
		require_once MASKA_APP.'controllers/'.$this->controller.'.php';
		$this->controller = new $this->controller;

		if(isset($url[1]) && method_exists($this->controller, $url[1]))
			$this->method 		= $url[1];
		unset($url[1]);

		$this->parameters = $url ? array_values($url) : [];
		
		call_user_func_array([$this->controller, $this->method], $this->parameters);
	}

	public function parseUrl($url)
	{
		return explode('/', filter_var(rtrim($url), FILTER_SANITIZE_URL));
	}
}