<?php

session_start();

define('MASKA', 	realpath(dirname(__FILE__)) .'/');
define('MASKA_APP', 	MASKA .'application/');

require(MASKA_APP  . 'config/config.php');
require(MASKA_APP  . 'config/database.php');
require(MASKA_APP	 . 'config/routes.php');

require(MASKA . 'system/model.php');
require(MASKA . 'system/view.php');
require(MASKA . 'system/controller.php');
require(MASKA . 'system/system.php');

global $config;
define('MASKA_URL', 	$config['base_url']);

$system 	= 	new System();