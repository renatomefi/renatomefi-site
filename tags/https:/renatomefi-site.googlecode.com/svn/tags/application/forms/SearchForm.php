<?php
class Form_SearchForm extends Zend_Form
{
	public function init()
	{
	   $query = $this->createElement('text','query');
	   $query->setLabel('Pesquisar :');
	   $query->setRequired(true);
	   $query->setAttrib('size',20);
	   $this->addElement($query);
	   
	   $submit = $this->createElement('submit','search');
	   $submit->setLabel('Procurar');
	   $submit->setDecorators(array('ViewHelper'));
	   $this->addElement($submit);
	}
}

?>