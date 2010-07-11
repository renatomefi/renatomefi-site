<?php
require_once 'Zend/Db/Table/Abstract.php';
class Model_User extends Zend_Db_Table_Abstract
{
	protected $_name = 'users';
	
	public function createUser ($username,$password,$firstName,$lastName,$role) {
		$rowUser = $this->createRow();
		
		if ($rowUser) {
			$rowUser->username = $username;
			$rowUser->password = md5($password);
			$rowUser->first_name = $firstName;
			$rowUser->last_name = $lastName;
			$rowUser->role = $role;
			$rowUser->save();
			
			return $rowUser;
		} else {
			throw new Zend_Exception('Não foi possível criar o usuário');
		}
	}
	
    public static function getUsers () {
    	$userModel = new self();
    	$select = $userModel->select();
    	$select->order(array('last_name','first_name'));
    	
    	return $userModel->fetchAll($select);
    }
    
    public function updateUser ($id,$user,$firstName,$lastName,$role)
    {
    	$rowUser = $this->find($id)->current();
    	if ($rowUser) {
    		$rowUser->username = $user;
    		$rowUser->first_name = $firstName;
    		$rowUser->last_name = $lastName;
    		$rowUser->role = $role;
    		$rowUser->save();
    		
    		return $rowUser;
    	} else {
    		throw new Zend_Exception('Não foi possível atualizar');
    	}
    }
    
    public function updatePassword ($id,$password)
    {
    	$rowUser = $this->find($id)->current();
    	
    	if ($rowUser) {
    		$rowUser->password = md5($password);
    		$rowUser->save();
    	} else {
    		throw new Zend_Exception('Não foi possível alterar a senha; Usuário não encontrado.');
    	}
    }
    
    public function deleteUser ($id)
    {
    	$rowUser = $this->find($id)->current();
    	if ($rowUser) {
    		$rowUser->delete();
    	} else {
    		throw new Zend_Exception('Não foi possível deletar o usuário; Usuário não encontrado.');
    	}
    }
    
    public function editapresentacaoUser($id,$imagem,$apresentacao_titulo,$apresentacao)
    {
    	$rowUser = $this->find($id)->current();
    	$rowUser->imagem = $imagem;
    	$rowUser->apresentacao_titulo = $apresentacao_titulo;
    	$rowUser->apresentacao = $apresentacao;
    	
    	$return = $rowUser->save();
    	if ($return) {
    		return $return;
    	} else {
    		return null;
    	}
    	
    }
    
    public function getIdByUsername($username)
    {
    	$select = $this->select();
    	$select->where('username = ?',$username);
    	$select->limit(1);
    	
    	$result = $this->fetchRow($select);
    	
    	if ($result) {
    		return $result->id;
    	} else {
    		throw new Zend_Exception('Usuário não encontrado no BD.');
    	}
    	
    }
}
?>