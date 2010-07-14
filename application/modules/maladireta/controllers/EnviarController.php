<?php
class Maladireta_EnviarController extends Zend_Controller_Action
{
    private $_aMailConfig;
    private $_strSmtp;
    
    public function preDispatch()
    {
        $bootstrap = $this->getInvokeArg('bootstrap');
        $aConfig = $bootstrap->getOptions();
        $this->_aMailConfig = array(
         'auth' => 'login'
        ,'username' => $aConfig['email']['username']
        ,'password' => $aConfig['email']['password']
        ,'ssl' => $aConfig['email']['ssl']
        ,'port' => $aConfig['email']['port']);
        $this->_strSmtp = $aConfig['email']['server'];
        parent::preDispatch();
    }
    
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
		$lista_id = $this->_request->getParam('lista');
		if ($mensagem_id) {
			$frmEscolher->getElement('mensagem_id')->setValue($mensagem_id);}
	    if ($lista_id) {
            $frmEscolher->getElement('lista_id')->setValue($lista_id);}			
		
		$this->view->error = $this->_request->getParam('error');
		$this->view->form = $frmEscolher;
	}
	
	public function processarAction()
	{
		$result = true;
		if ($this->_request->isPost()) {
			$mdlMensagem = new Maladireta_Model_Mensagem();
			$mdlAssinantes = new Maladireta_Model_Assinante();

			$mensagem = $mdlMensagem->find($this->_request->getParam('mensagem_id'))->current();
			$assinantes = $mdlAssinantes->getAssinantesByListaId($this->_request->getParam('lista_id'));
			
			if ($mensagem && count($assinantes) > 0) {
				
				$sender = 'teste';
                $subject = $mensagem->assunto;
                $message = $mensagem->mensagem;
                foreach ($assinantes as $assinante) {
                	
                	$mail = new Zend_Mail();
		            $mail->setSubject($subject);
		            $mail->setFrom('Mackenzie Brasília','admin@renatomefi.com.br');
		            $mail->addTo($assinante->email,$assinante->first_name);
		            $mail->setBodyHtml(utf8_decode($message));
                    
		            $mailTransport = new Zend_Mail_Transport_Smtp($this->_strSmtp,$this->_aMailConfig);
                    $resultmail = $mail->send($mailTransport);
                    
                    echo $assinante->email;
                    
                    if ($resultmail) {
                    	echo '<span style="color:#0F0;"> OK</span><br />';
                    } else {
                    	echo '<span style="color:#F00;"> Erro</span><br />';
                    }
                }				
                
			} else {
				$result = false;
				$error = 'Erro, verifique se a lista selecionada contém assinantes.';
			}
		} else {
			$result = false;
			$error = 'Por favor, seleciona a lista e a mensagem que serão enviadas.';
		}

		if ($result === false) {
			$this->_forward('escolher','enviar','maladireta', array(
				'error' => $error,
				'mensagem' => $mensagem->id,
				'lista' => $this->_request->getParam('lista_id')));
		}
	}
}
?>