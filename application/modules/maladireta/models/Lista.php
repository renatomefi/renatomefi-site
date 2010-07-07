<?php
class Maladireta_Model_lista extends Zend_Db_Table_Abstract
{
	protected $_name = 'maladireta_lista';
	
	public function getListas()
	{
		$select = $this->select();
		$select->order('name');
		
		$listas = $this->fetchAll($select);
		
		if ($listas) {
			return $listas;
		} else {
			return null;
		}
	}
	
	public function createLista($nome,$owner,$info)
	{
		$row = $this->createRow();
		$row->nome = $nome;
		$row->owner = $owner;
		$row->info = $info;
		
		$result = $row->save();
		
		if ($result) {
			return $this->_db->lastInsertId();
		} else {
			return null;
		}
	}
	
	public function updateLista($id,$nome,$info)
	{
		$lista = $this->find($id)->current();
		
		$lista->nome = $nome;
		$lista->info = $info;
		
		$result = $lista->save();
		if ($result) {
			return $result;
		} else {
			throw new Zend_Exception('Lista não encontrada no BD.');
		}
	}
	
	public function deleteLista($id)
	{
		$lista = $this->find($id)->current();
		
		$result = $lista->delete();
		
		if ($result) {
			return $result;
		} else {
			throw new Zend_Exception('Lista não encontrada no BD.');
		}
	}
}
?>