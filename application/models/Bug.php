<?php

class Model_Bug extends Zend_Db_Table_Abstract
{
    protected $_name = 'bugs';
    
    public function createBug($name,$email,$date,$url,$description,$priority,$status)
    {
        $row = $this->createRow();
        
        $row->author = $name;
        $row->email = $email;
        $dateObject = new Zend_Date($date);
        $row->date = $dateObject->get(Zend_Date::TIMESTAMP);
        $row->url = $url;
        $row->description = $description;
        $row->priority = $priority;
        $row->status = $status;
        
        $row->save();
        
        $id = $this->_db->lastInsertId();
        return $id;
    }
    
    public function updateBug($id,$name,$email,$date,$url,$description,$priority,$status)
    {
        $row = $this->find($id)->current();
        
        if ($row) {
            $row->author = $name;
            $row->email = $email;
            $dateObject = new Zend_Date($date);
            $row->date = $dateObject->get(Zend_Date::TIMESTAMP);
            $row->url = $url;
            $row->description = $description;
            $row->priority = $priority;
            $row->status = $status;
            
            $row->save();
            
            return true;
        } else {
            throw new Zend_Exception('Não foi possível fazer o update; Registro não encontrado!');
        }
    }
    
    public function deleteBug($id) {
        $row = $this->find($id)->current();
        
        if ($row){
            $row->delete();
            return true;
        } else {
            throw new Zend_Exception('Não foi excluir o bug; Registro não encontrado!');
        }
        
    }
    
    public function fetchPaginatorAdapter($filters = array(), $sortField = null, $limit = null, $page = 1)
    {
        $select = $this->select();
        
        if (count($filters) > 0) {
            foreach ($filters as $field => $filter) {
                $select->where($field . '= ?', $filter);
            }
        }
        
        if (null != $sortField) {
            $select->order($sortField);
        }

        $adapter = new Zend_Paginator_Adapter_DbSelect($select);
        return $adapter;
    }
    
}

?>