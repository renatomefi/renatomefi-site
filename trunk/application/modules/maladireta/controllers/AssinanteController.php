<?php
class Maladireta_AssinanteController extends Zend_Controller_Action
{
	
	public function listAction()
	{
		$lista_id = $this->_request->getParam('lista');
		$mdlAssinante = new Maladireta_Model_Assinante();
        $mdlLista = new Maladireta_Model_Lista();
        $lista = $mdlLista->find($lista_id)->current();
        $assinantes = $mdlAssinante->getAssinantesByListaId($lista->id);
        
        $this->view->lista = $lista;
        $this->view->assinantes = $assinantes;
	}
	
	public function createAction()
	{
		$lista_id = $this->_request->getParam('lista');
		$frmAssinante = new Maladireta_Form_Assinante();
		$mdlAssinante = new Maladireta_Model_Assinante();
		$mdlLista = new Maladireta_Model_Lista();
		
		if ($this->_request->isPost()) {
			if ($frmAssinante->isValid($_POST)) {
				$result = $mdlAssinante->createAssinante(
				    $frmAssinante->getValue('lista_id'),
				    $frmAssinante->getValue('first_name'),
				    $frmAssinante->getValue('last_name'),
				    $frmAssinante->getValue('email'),
				    $frmAssinante->getValue('info')
				);
				
				if ($result) {
					$this->_redirect('/maladireta/assinante/list/lista/' . $frmAssinante->getValue('lista_id'));
				}
			}
		}
		
		$lista = $mdlLista->find($lista_id)->current();
		$frmAssinante->getElement('lista_id')->setValue($lista->id);
		$this->view->form = $frmAssinante;
	}
	
	public function editAction()
	{
        $frmAssinante = new Maladireta_Form_Assinante();
        $mdlAssinante = new Maladireta_Model_Assinante();
        $mdlLista = new Maladireta_Model_Lista();
        $assinante = $mdlAssinante->find($this->_request->getParam('id'))->current();
        
        if ($this->_request->isPost()) {
            if ($frmAssinante->isValid($_POST)) {
                $result = $mdlAssinante->editAssinante(
                    $frmAssinante->getValue('id'),
                    $frmAssinante->getValue('lista_id'),
                    $frmAssinante->getValue('first_name'),
                    $frmAssinante->getValue('last_name'),
                    $frmAssinante->getValue('email'),
                    $frmAssinante->getValue('info')
                );
                
                if ($result) {
                    $this->_redirect('/maladireta/assinante/list/lista/' . $frmAssinante->getValue('lista_id'));
                }
            }
        }
        $frmAssinante->populate($assinante->toArray());
        $this->view->form = $frmAssinante;
	}
	
	public function deleteAction()
	{
		$id = $this->_request->getParam('id');
		$mdlAssinante = new Maladireta_Model_Assinante();
		$assinante = $mdlAssinante->find($id)->current();
		$lista_id = $assinante->lista_id;
		
		$result = $assinante->delete();
		
		if ($result) {
			$this->_redirect('/maladireta/assinante/list/lista/' . $lista_id);
		}
		
	}
	
}
?>