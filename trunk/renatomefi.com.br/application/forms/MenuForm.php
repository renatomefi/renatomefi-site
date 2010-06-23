<?php
class Form_MenuForm extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
        
        $id = $this->createElement('hidden','id');
        $id->setDecorators(array('viewHelper'));
        $this->addElement($id);
        
        $name = $this->createElement('text','name');
        $name->setLabel('Nome: ');
        $name->setRequired(true);
        $name->setAttrib('size',40);
        $name->addFilter('StripTags');
        $this->addElement($name);
        
        $submit = $this->addElement('submit','submit',array('label' => 'Enviar'));
    }
}
?>