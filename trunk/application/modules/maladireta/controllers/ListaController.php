<?php
class Maladireta_ListaController extends Zend_Controller_Action {
	public function indexAction() 
	{
	   $mdlLista = new Maladireta_Model_Lista();
	   $listas = $mdlLista->getListas();
	   
	   $this->view->listas = $listas;
	}
	
	public function createAction() 
	{
		$frmLista = new Maladireta_Form_Lista ();
		$mdlLista = new Maladireta_Model_Lista ();
		$auth = Zend_Auth::getInstance();
		if ($this->_request->isPost ()) {
			if ($frmLista->isValid ( $_POST )) {
                $result = $mdlLista->createLista(
                    $frmLista->getValue('nome'),
                    $auth->getIdentity()->username,
                    $frmLista->getValue('info')
                );
                if ($result) {
                	$this->_redirect('/maladireta/lista');
                }
			}
		}
		
		$this->view->form = $frmLista;
	}
	
	public function editAction() 
	{
	    $frmLista = new Maladireta_Form_Lista ();
        $mdlLista = new Maladireta_Model_Lista ();
        $id = $this->_request->getParam('id');
        $lista = $mdlLista->find($id)->current();
        
        if ($this->_request->isPost ()) {
            if ($frmLista->isValid ( $_POST )) {
                $result = $mdlLista->updateLista(
                    $frmLista->getValue('id'),
                    $frmLista->getValue('nome'),
                    $frmLista->getValue('info')
                );
                if ($result) {
                    $this->_redirect('/maladireta/lista');
                }
            }
        }
        $frmLista->populate($lista->toArray());
        $this->view->form = $frmLista;
	}
	
	public function deleteAction() 
	{
	   $id = $this->_request->getParam('id');
	   $mdlLista = new Maladireta_Model_Lista();
	   $result = $mdlLista->deleteLista($id);

	   if ($result) {
	   	   $this->_redirect('/maladireta/lista');
	   }
	}
}
?>