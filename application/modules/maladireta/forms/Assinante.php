<?php
class Maladireta_Form_Assinante extends Zend_Form
{
	public function init()
	{
		$id = $this->createElement('hidden','id');
		$this->addElement($id);
		
		$lista_id = $this->createElement('hidden','lista_id');
        $this->addElement($lista_id);
        
        $nome = $this->createElement('text','first_name');
        $nome->setLabel('Nome: ');
        $nome->setRequired(false);
        $nome->setAttrib('size',40);
        $this->addElement($nome);
        
        $snome = $this->createElement('text','last_name');
        $snome->setLabel('Sobrenome: ');
        $snome->setRequired(false);
        $snome->setAttrib('size',40);
        $this->addElement($snome);
        
		$email = $this->createElement('text','email');
		$email->setLabel('E-mail: ');
		$email->setRequired(true);
		//$email->addValidator('EmailAdress');
        //$email->addErrorMessage('E-mail inválido!');
        $this->addElement($email);
        
        $info = $this->createElement('textarea','info');
        $info->setLabel('Informações adicionais: ');
        $info->setAttribs(array(
            'rows' => 5,
            'cols' => 40
        ));
        $this->addElement($info);
        
        $submit = $this->addElement('submit','submit', array('label' => 'Salvar'));
	}
}
?>