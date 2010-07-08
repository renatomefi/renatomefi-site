<?php
class Maladireta_AssinanteController extends Zend_Controller_Action
{
	public function createAction()
	{
		$lista_id = $this->_request->getParam('lista');
		$frmAssinante = new Maladireta_Form_Assinante();
		$mdlAssinante = null;
		$mdlLista = new Maladireta_Model_Lista();
		
		$lista = $mdlLista->find($lista_id)->current();
		$this->view->form = $frmAssinante;
	}
}
?>