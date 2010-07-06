<?php

class Maladireta_Model_Mensagem extends Zend_Db_Table_Abstract
{
    protected $_name = 'maladireta_mensagem';

    public function createMensagem($autor_id,$nome,$assunto,$mensagem)
    {
        $row = $this->createRow();
        
        $row->autor_id = $autor_id;
        $row->nome = $nome;
        $row->assunto = $assunto;
        $row->mensagem = $mensagem;
        $dateObject = new Zend_Date(time());
        $row->criado = $dateObject->get(Zend_Date::TIMESTAMP);
        
        $row->save();
        
        $id = $this->_db->lastInsertId();
        return $id;
    }
    
    public function updateMensagem($id,$nome,$assunto,$mensagem)
    {
    	$currentMensagem = $this->find($id)->current();
    	if ($currentMensagem) {
	        $currentMensagem->nome = $nome;
	        $currentMensagem->assunto = $assunto;
	        $currentMensagem->mensagem = $mensagem;
	        $dateObject = new Zend_Date(time());
	        $currentMensagem->criado = $dateObject->get(Zend_Date::TIMESTAMP);
    		 
    		return $currentMensagem->save();
    	} else {
    		throw new Zend_Exception('Mensagem não encontrada no BD.');
    	}
    }
    
    public function deleteMensagem($id)
    {
    	$mensagem = $this->find($id)->current();
    	if ($mensagem) {
    		return $mensagem->delete();
    	} else {
    		throw new Zend_Exception('Mensagem não encontrada no BD.');
    	}
    }
    
    public function getMensagens()
    {
        $select = $this->select();
        $select->order('nome');
        $mensagens = $this->fetchAll($select);
        if ($mensagens->count() > 0) {
            return $mensagens;
        } else {
            return null;
        }
    }
    
    public function getMensagemIdByNome($nome)
    {
    	$select = $this->select();
    	$select->where('nome= ?',$nome);
    	$select->limit(1);
    	
    	$result = $this->fetchRow($select);
    	
    	if ($result) {
    		return $result->id;
    	} else {
    		return null;
    	}
    }
}

?>