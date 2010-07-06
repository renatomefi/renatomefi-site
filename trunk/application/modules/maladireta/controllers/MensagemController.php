<?php
class Maladireta_MensagemController extends Zend_Controller_Action {
	
	public function indexAction() {
	
	}
	
	public function createAction()
	{
		$identity = Zend_Auth::getInstance()->getIdentity ();
		$frmMensagem = new Maladireta_Form_Mensagem ();
		$mdlMensagem = new Maladireta_Model_Mensagem ();
		
		if ($this->_request->isPost ()) {
			if ($frmMensagem->isValid ( $_POST )) {
		        $result = $mdlMensagem->createMensagem(
		          $identity->username,
		          $frmMensagem->getValue('nome'),
		          $frmMensagem->getValue('assunto'),
		          $frmMensagem->getValue('mensagem')
		        );
		        if ($result) {
		        	$this->_redirect('/maladireta/mensagem/list');
		        }
			}
		}
		
		$frmMensagem->getElement ( 'autor' )->setValue ( $identity->first_name . ' ' . $identity->last_name );
		$this->view->form = $frmMensagem;
	}
	
	public function editAction()
	{
		
	}
}
?>