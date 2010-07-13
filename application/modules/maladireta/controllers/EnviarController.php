<?php
class Maladireta_EnviarController extends Zend_Controller_Action
{
	public function indexAction()
	{
		$this->_forward('escolher');
	}
	
	public function escolherAction()
	{
		$mdlLista = new Maladireta_Model_Lista();
		$mdlMensagem = new Maladireta_Model_Mensagem();
		$frmEscolher = new Maladireta_Form_Escolher();
		
		$mensagens = $mdlMensagem->getMensagens();
		$mensagens_options = array();
		foreach ($mensagens as $mensagem) {
			$mensagens_options[$mensagem->id] = $mensagem->nome;
		}
		
		$listas = $mdlLista->getListas();
		$listas_options = array();
		foreach ($listas as $lista) {
			$listas_options[$lista->id] = $lista->nome;
		}
		
		$frmEscolher->setMethod('post');
		$frmEscolher->setAction('/maladireta/enviar/processar');
		$frmEscolher->getElement('mensagem_id')->addMultiOptions($mensagens_options);
		$frmEscolher->getElement('lista_id')->addMultiOptions($listas_options);
		
		$mensagem_id = $this->_request->getParam('mensagem');
		if ($mensagem_id) {
			$frmEscolher->getElement('mensagem_id')->setValue($mensagem_id);
		}
		
		$this->view->form = $frmEscolher;
	}
}
?>