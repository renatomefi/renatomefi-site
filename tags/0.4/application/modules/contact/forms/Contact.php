<?php
class Contact_Form_Contact extends Zend_Form
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
		//$email->addValidator('EmailAdress');
		$email->addErrorMessage('E-mail inválido!');
		$this->addElement($email);
		
		$subject = $this->createElement('text','subject');
		$subject->setLabel('Assunto: ');
		$subject->setRequired(true);
		$subject->setAttrib('size',60);
		$this->addElement($subject);
		
		$attachment = $this->createElement('file','attachment');
        $attachment->setLabel('Envie um arquivo:');
        $attachment->setDestination(APPLICATION_PATH . '/../public_html/uploads');
        $attachment->addValidator('Count',false,1);
        $attachment->addValidator('Size',false,3078000);
        $this->addElement($attachment);
        
		$message = $this->createElement('textarea','message');
		$message->setLabel('Message: ');
		$message->setRequired(true);
		$message->setAttrib('cols',50);
		$message->setAttrib('rows',12);
		$this->addElement($message);

		$recaptchaPrivateKey = '6Le6LLsSAAAAANDY3DXIEiCQmoE1czWXQx-EiWsU';
		$recaptchaPublicKey = '6Le6LLsSAAAAAEyvrwfjCbRHpp9sb57FbrOIrWwX';
		$recaptcha = new Zend_Service_ReCaptcha($recaptchaPublicKey,$recaptchaPrivateKey);
		$captcha = new Zend_Form_Element_Captcha('captcha',
		  array('captcha' => 'ReCaptcha',
		        'captchaOptions' => array('captcha' => 'ReCaptcha',
		                                  'service' => $recaptcha)));
		  
		$this->addElement($captcha);
		
		$this->setAttrib('enctype','multipart/form-data');
		
		$submit = $this->addElement('submit','submit',array('label' => 'Enviar Mensagem'));
	}
}
?>