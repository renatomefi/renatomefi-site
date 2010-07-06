<?php
class Maladireta_MensagemController extends Zend_Controller_Action {
	
	public function indexAction() {
	
	}
	
	public function listAction() {
		$mdlMensagem = new Maladireta_Model_Mensagem();
		$mensagens = $mdlMensagem->getMensagens();
		$this->view->mensagens = $mensagens;
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
		$frmMensagem->setMethod('post');
		$frmMensagem->setAction('/maladireta/mensagem/create');
		$this->view->form = $frmMensagem;
	}
	
	public function editAction()
	{
		$frmMensagem = new Maladireta_Form_Mensagem();
		$mdlMensagem = new Maladireta_Model_Mensagem();
		$mdlUser = new Model_User();
		
		$id = $this->_request->getParam('id');
		$mensagem = $mdlMensagem->find($id)->current();
		
		$select = $mdlUser->select();
        $select->where('username= ?',$mensagem->autor_id);
        $select->limit(1);
        $autor = $mdlUser->fetchRow($select)->toArray();
        
        if ($this->_request->isPost()) {
        	if ($frmMensagem->isValid($_POST)) {
        		$result = $mdlMensagem->updateMensagem(
        		  $frmMensagem->getValue('id'),
        		  $frmMensagem->getValue('nome'),
        		  $frmMensagem->getValue('assunto'),
        		  $frmMensagem->getValue('mensagem')
        		);
        		if ($result) {
        			$this->_redirect('/maladireta/mensagem/list');
        		}
        	}
        } else {
            $frmMensagem->getElement('id')->setValue($mensagem->id);
            $frmMensagem->getElement('autor')->setValue($autor['first_name'] . ' ' . $autor['last_name']);
            $frmMensagem->getElement('nome')->setValue($mensagem->nome);
            $frmMensagem->getElement('assunto')->setValue($mensagem->assunto);
            $frmMensagem->getElement('mensagem')->setValue($mensagem->mensagem);
        }
		
		$frmMensagem->setMethod('post');
        $frmMensagem->setAction('/maladireta/mensagem/edit');
        $this->view->form = $frmMensagem;
	}
	
	public function deleteAction()
	{
		$id = $this->_request->getParam('id');
		$mdlMensagem = new Maladireta_Model_Mensagem();
		$result = $mdlMensagem->deleteMensagem($id);
		if ($result) {
			$this->_redirect('/maladireta/mensagem/list');
		}
	}
}
?>