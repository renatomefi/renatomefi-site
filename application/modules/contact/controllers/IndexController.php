<?php
class Contact_IndexController extends Zend_Controller_Action
{
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
			$config = array('auth' => 'login',
			                'username' => 'teste@renatomefi.com.br',
			                'password' => 'B56533',
			                'ssl' => 'tls',
			                'port' => '587');
			
			$transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com',$config);
			
			$mail->setSubject($subject);
			$mail->setFrom($email,$sender);
			$mail->addTo('contato@renatomefi.com.br','WebMaster');
			$mail->setBodyHtml($htmlMessage);
			$mail->setBodyText($message);
			
			$result = $mail->send($transport);
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