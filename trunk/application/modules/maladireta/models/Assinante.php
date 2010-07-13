<?php
class Maladireta_Model_Assinante extends Zend_Db_Table_Abstract
{
	protected $_name = 'maladireta_assinante';
	
	public function createAssinante($lista_id,$first_name,$last_name,$email,$info)
	{
		$row = $this->createRow();
		$row->first_name = $first_name;
		$row->last_name = $last_name;
		$row->email = $email;
		$row->info = $info;
		$row->lista_id = $lista_id;
		
		$result = $row->save();
		
		if ($result) {
			return $this->_db->lastInsertId();
		} else {
			throw new Zend_Exception('Não foi possível inserir assinante no BD.');
		}
	}
	
	public function editAssinante($id,$lista_id,$first_name,$last_name,$email,$info)
	{
		$row = $this->find($id)->current();
        $row->first_name = $first_name;
        $row->last_name = $last_name;
        $row->email = $email;
        $row->info = $info;
        $row->lista_id = $lista_id;
        
        $result = $row->save();
        
        if ($result) {
            return $result;
        } else {
            throw new Zend_Exception('Assinante não encontrado no BD.');
        }
	}
	
	public function deleteAssinante($id)
	{
		$assinante = $this->find($id)->current();
		
		$result = $assinante->delete();
		
		if ($result) {
			return $result;
		} else {
			throw new Zend_Exception('Assinante não encontrado no BD.');
		}
	}
	
	public function getAssinantesByListaId($lista_id)
	{
		$select = $this->select();
		$select->where('lista_id = ?',$lista_id);
		
		$result = $this->fetchAll($select);
		
		if ($result) {
			return $result;
		} else {
			return null;
		}
	}
}
?>