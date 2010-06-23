<?php
class Form_MenuitemForm extends Zend_Form
{
	public function init()
	{
		$modelPage = new Model_Page();
		$this->setMethod('post');
		
		$id = $this->createElement('hidden','id');
		$id->setDecorators(array('ViewHelper'));
		$this->addElement($id);
		
		$menuId = $this->createElement('hidden','menu_id');
        $menuId->setDecorators(array('ViewHelper'));
        $this->addElement($menuId);
        
        $label = $this->createElement('text','label');
        $label->setLabel('Rótulo: ');
        $label->setRequired(true);
        $label->addFilter('StripTags');
        $label->addValidator('StringLength',false,array(0, 40));
        $this->addElement($label);
        
        $pageId = $this->createElement('select','page_id');
        $pageId->setLabel('Selecione um link para o item: ');
        $pageId->setRequired(true);
        $pages = $modelPage->fetchAll(null,'name');
        $pageId->addMultiOption(0,'Nenhuma');
        if ($pages->count() > 0) {
        	foreach ($pages as $page) {
        		$pageId->addMultiOption($page->id,$page->name);
        	}
        }
        $this->addElement($pageId);
        
        $link = $this->createElement('text','link');
        $link->setLabel('Ou especifique um link: ');
        $link->setRequired(false);
        $link->setAttrib('size',50);
        $this->addElement($link);
        
        $submit = $this->addElement('submit','submit',array('label' => 'Salvar'));
	}
}

?>