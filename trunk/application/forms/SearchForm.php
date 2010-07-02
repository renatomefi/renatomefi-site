<?php
class Form_SearchForm extends Zend_Form
{
	public function init()
	{
	   $query = $this->createElement('text','query');
	   $query->setRequired(true);
	   $query->setAttrib('size',20);
	   $query->setDecorators(array(
            'ViewHelper',
            array('HtmlTag', array('tag' => 'div'))
       ));
       $query->removeDecorator('label');
	   $this->addElement($query);
	   
	   $submit = $this->createElement('image','search');
	   $submit->setValue('/skins/brown/images/main_container/search_icon.png');
	   $submit->setDecorators(array(
		    'ViewHelper',
		    array('HtmlTag', array('tag' => 'div'))
	   ));
	   $this->addElement($submit);

	   $this->setDecorators(array(
		    'FormElements',
		    array('HtmlTag', array('tag' => 'div')),
		    'Form'
	   ));
	   
	   $this->setMethod('get');
	}
}

?>