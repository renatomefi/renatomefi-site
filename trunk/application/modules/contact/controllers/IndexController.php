<?php
class Contact_IndexController extends Zend_Controller_Action
{
	public function indexAction()
	{
		$frmContact = new Contact_Form_Contact();
		$frmContact->setAction('/contact');
		$frmContact->setMethod('post');
		$this->view->form = $frmContact;
	}
}
?>