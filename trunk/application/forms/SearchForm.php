<?php
class Form_SearchForm extends Zend_Form
{
	public function init()
	{
	   $query = $this->createElement('text','query');
	   $query->setRequired(true);
	   $query->setAttrib('size',20);
	   $query->addDecorator(array('div_d' => 'HtmlTag'),array('tag' => 'div'));
	   $this->addElement($query);
	   
	   $submit = $this->createElement('submit','search');
	   $submit->setLabel('Procurar');
	   //$submit->setDecorators(array('ViewHelper'));
	   $submit->setDecorators(array(
		    'ViewHelper',
		    'Description',
		    array('HtmlTag', array('tag' => null)),
		    array('Label', array('tag' => null)),
		));
		$this->addElement($submit);
		$this->setDecorators(array(
		    'FormElements',
		    array('HtmlTag', array('tag' => 'div')),
		    'Form',
		));
	   
	   
	}
}

?>