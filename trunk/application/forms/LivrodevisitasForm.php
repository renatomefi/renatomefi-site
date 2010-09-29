<?php

class Form_LivrodevisitasForm extends Zend_Form
{
	public function init()
	{
		$nome = $this->createElement('text','nome');
		$nome->setLabel('Nome: ');
		$nome->setRequired(true);
		$nome->setAttrib('size',40);
		$this->addElement($nome);
		
		$email = $this->createElement('text','email');
		$email->setLabel('Email: (Não será exibido) ');
		$email->setRequired(true);
		$email->setAttrib('size',60);
		$this->addElement($email);
		
		$msg = $this->createElement('textarea','mensagem');
		$msg->setLabel('Mensagem: ');
		$msg->setRequired(true);
		$msg->setAttribs(array('rows' => 5,'cols' => 60));
		$this->addElement($msg);
		
        $recaptchaPrivateKey = '6Le6LLsSAAAAANDY3DXIEiCQmoE1czWXQx-EiWsU';
        $recaptchaPublicKey = '6Le6LLsSAAAAAEyvrwfjCbRHpp9sb57FbrOIrWwX';
        $recaptcha = new Zend_Service_ReCaptcha($recaptchaPublicKey,$recaptchaPrivateKey);
        $captcha = new Zend_Form_Element_Captcha('captcha',
          array('captcha' => 'ReCaptcha',
                'captchaOptions' => array('captcha' => 'ReCaptcha',
                                          'service' => $recaptcha)));
          
        $this->addElement($captcha);
        
        $this->setAttrib('enctype','multipart/form-data');
        
        $submit = $this->addElement('submit','submit',array('label' => 'Assinar'));		
	}
}

?>