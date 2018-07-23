<?php
class ConteudoModel extends Model{
	
	public function GetAuth($email,$password){
		
		#   // table, where, where-bind
	   return $this->read('conteudo', "email = :email and password = :password", array( ':email' => $email, ':password' => $password));
	}
	
	public function GetAll($userId){		
		return $this->read('conteudo', "user_id = :userId",  array( ':userId' => $userId));		
	}
		
	public function SetDelete($idRegistro){
		return $this->delete('conteudo', 'id = :idRegistro', array(':idRegistro' => $idRegistro));
	}
	
	public function SetCreate($userId,$conteudo){
		return $this->create('conteudo',array( 'user_id' => $userId, 'conteudo' => $conteudo));
	}
	
	public function getById($idRegistro){
		return $this->read('conteudo', 'id = :idRegistro', array(':idRegistro' => $idRegistro));
	}
	
	public function SetUpdate($idRegistro,$conteudo){
		$campos = array('conteudo' => $conteudo);
		return $this->update(
								'conteudo',
								$campos,
								'id = :idRegistro', 
								array(':idRegistro' => $idRegistro)
							);
	}

}