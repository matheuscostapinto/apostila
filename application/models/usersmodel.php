<?php
class UsersModel extends Model{
	
	public function GetAuth($email,$password){
		
		#   // table, where, where-bind
	   return $this->read('users', "email = :email and password = :password", array( ':email' => $email, ':password' => $password));
	}
	
	public function GetAll(){		
		return $this->read('users');		
	}
		
	public function SetDelete($idRegistro){
		return $this->delete('users', 'id = :idRegistro', array(':idRegistro' => $idRegistro));
	}
	
	public function SetCreate($name,$email,$password){
		return $this->create('users',array( 'name' => $name, 'email' => $email, 'password' => $password));
	}
	
	public function getById($idRegistro){
		return $this->read('users', 'id = :idRegistro', array(':idRegistro' => $idRegistro));
	}
	
	public function SetUpdate($idRegistro,$name,$email,$password = null){
		if($password != null){
			$campos = array('name' => $name, 'email' => $email, 'password' => $password);
		}else{
			$campos = array('name' => $name, 'email' => $email);
		}
		return $this->update(
								'users',
								$campos,
								'id = :idRegistro', 
								array(':idRegistro' => $idRegistro)
							);
	}

}