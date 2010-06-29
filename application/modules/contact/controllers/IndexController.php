<?php
class Contact_IndexController extends Zend_Controller_Action
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
        // Solução Provisória com Include
		require_once APPLICATION_PATH . '/modules/contact/forms/Contact.php';
		
		$frmContact = new Contact_Form_Contact();
		if ($this->_request->isPost() && $frmContact->isValid($_POST)) {
			$sender = $frmContact->getValue('name');
			$email = $frmContact->getValue('email');
			$subject = $frmContact->getValue('subject');
			$message = $frmContact->getValue('message');
			
			$htmlMessage = $this->view->partial(
			     'templates/default.phtml',
			     $frmContact->getValues()
			);
			
			$mail = new Zend_Mail();
			$mail->setSubject($subject);
			$mail->setFrom($email,$sender);
			$mail->addTo('contato@renatomefi.com.br','WebMaster');
			$mail->setBodyHtml($htmlMessage);
			$mail->setBodyText($message);
			
			$mailTransport = new Zend_Mail_Transport_Smtp($this->_strSmtp,$this->_aMailConfig);
			
			$result = $mail->send($mailTransport);
			
			$this->view->messageProcessed = true;
			
			if ($result) {
				$this->view->sendError = false;
			} else {
				$this->view->sendError = true;
			}
			
		}
		$frmContact->setAction('/contact');
		$frmContact->setMethod('post');
		$this->view->Form = $frmContact;
	}
}
?>