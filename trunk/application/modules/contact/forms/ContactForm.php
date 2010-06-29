<?php
class Contact_Forms_Contact extends Zend_Form
{
	public function init()
	{
		$name = $this->createElement('text','name');
		$name->setLabel('Nome: ');
		$name->setRequired(true);
		$name->setAttrib('size',40);
		$this->addElement($name);
		
		$email = $this->createElement('text','email');
		$email->setLabel('E-mail: ');
		$email->setRequired(true);
		$email->setAttrib('size',40);
		$email->addValidator('EmailAdress');
		$email->addErrorMessage('E-mail inválido!');
		$this->addElement($email);
		
		$subject = $this->createElement('text','subject');
		$subject->setLabel('Assunto: ');
		$subject->setRequired(true);
		$subject->setAttrib('size',60);
		$this->addElement($subject);
		
		$message = $this->createElement('textarea','message');
		$message->setLabel('Message: ');
		$message->setRequired(true);
		$message->setAttrib('cols',50);
		$message->setAttrib('rows',12);
		$this->addElement($message);
		
		$submit = $this->addElement('submit','submit',array('label' => 'Enviar Mensagem'));
	}
}
?>