<?php
class Model_Livrodevisitas extends Zend_Db_Table_Abstract
{
	protected $_name = 'livrodevisitas';
	
	public function assinarLivro($nome,$email,$mensagem)
	{
		$date = new Zend_Date();
		$date->set(time(),Zend_Date::TIMESTAMP);
		$row = $this->createRow();
		$row->nome = $nome;
		$row->email = $email;
		$row->mensagem = $mensagem;
		$row->time = $date->get(Zend_Date::TIMESTAMP);
		
		$result = $row->save();
		
		if ($result) {
			return $this->_db->lastInsertId();
		} else {
			throw new Zend_Exception('Não foi possível inserir a assinatura do livro!');
		}
	}
	
	public function deletarAssinatura($id)
	{
		$assinatura = $this->find($id)->current();
		
		$result = $assinatura->delete();
		
		if ($result) {
			return $result;
		} else {
			throw new Zend_Exception('Assinatura não encontrada no BD!');
		}
	}
	
	public function getAssinaturas()
	{
		$select = $this->select();
		$select->order('time ASC');
		
		$result = $this->fetchAll($select);
		
		if ($result) {
			return $result;
		} else {
			return null;
		}
	}
}
?>