<?php
class Contact_IndexController extends Zend_Controller_Action
{
	public function indexAction()
	{
        // Solução Provisória com Include
		require_once APPLICATION_PATH . '/modules/contact/forms/Contact.php';
		
		$frmContact = new Contact_Form_Contact();
		if ($this->_request->isPost() && $frmContact->isValid($_POST)) {
			
		}
		$frmContact->setAction('/contact');
		$frmContact->setMethod('post');
		$this->view->Form = $frmContact;
	}
}
?>