<?php
class Users extends Model{
	public function GetAuth($email,$password){
		
		#   // table, where, where-bind
	   return $this->read('users', "email = :email and password = :password", array( ':email' => $email, ':password' => $password));
	}
}