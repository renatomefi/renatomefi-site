<?php
class Maladireta_Form_Lista extends Zend_Form
{
	public function init()
	{
		$id = $this->createElement('hidden','id');
		$this->addElement($id);
		
		$nome = $this->createElement('text','nome');
		$nome->setLabel('Nome: ');
		$nome->setRequired(true);
		$nome->setAttrib('size',40);
		$this->addElement($nome);
		
		$info = $this->createElement('textarea','info');
		$info->setLabel('Outras informações: ');
		$info->setAttribs(array(
		  'rows' => 5,
		  'cols' => 40
		));
		$this->addElement($info);
		
		$submit = $this->addElement('submit','submit',array('label' => 'Salvar'));
	}
}
?>