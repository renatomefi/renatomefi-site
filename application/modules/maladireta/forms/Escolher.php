<?php
class Maladireta_Form_Escolher extends Zend_Form
{
	public function init()
	{
		$mensagem = $this->createElement('select','mensagem_id');
		$mensagem->setLabel('Escolha a Mensagem para enviar: ');
		$mensagem->setRequired(true);
		$mensagem->addMultiOption('','');
		$this->addElement($mensagem);
		
		$lista = $this->createElement('select','lista_id');
		$lista->setLabel('Escolha a lista de assinantes: ');
		$lista->setRequired(true);
		$lista->addMultiOption('','');
		$this->addElement($lista);
		
		$submit = $this->addElement('submit','submit',array('label' => 'Enviar Mala Direta'));
	}
}
?>