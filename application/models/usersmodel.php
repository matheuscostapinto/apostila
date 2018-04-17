<?php
class UsersModel extends Model{
	
	public function GetAuth($email,$password){
		
		#   // table, where, where-bind
	   return $this->read('users', "email = :email and password = :password", array( ':email' => $email, ':password' => $password));
	}
	
	public function GetAll(){		
		return $this->read('users');		
	}	
	
}