<?php
// receber os dados recebidos na inicialização da aplicação

class System
{
	private $route;
	
	public function run()
	{
		$this->route=$_GET['route'] ?? null;
		echo $this->route;
	}
}