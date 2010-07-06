<?php
class Maladireta_Form_Mensagem extends Zend_Form
{
	public function init()
	{
        $id = $this->createElement('hidden','id');
        $this->addElement($id);
        
        $autor = $this->createElement('text','autor');
        $autor->setLabel('Autor: ');
        $autor->setAttrib('disabled',true);
        $autor->setAttrib('size',40);
        $this->addElement($autor);
        
        $nome = $this->createElement('text','nome');
        $nome->setLabel('Nome: ');
        $nome->setRequired(true);
        $nome->setAttrib('size',20);
        $this->addElement($nome);
        
        $assunto = $this->createElement('text','assunto');
        $assunto->setLabel('Assunto: ');
        $assunto->setRequired(true);
        $assunto->setAttrib('size',40);
        $this->addElement($assunto);
        
        $mensagem = $this->createElement('textarea','mensagem');
        $mensagem->setLabel('Mensagem: ');
        $mensagem->setRequired(true);
        $mensagem->setAttrib('cols',80);
        $mensagem->setAttrib('rows',30);
        $mensagem->setOptions(array('class'=>'mceEditorAdvanced'));
        $this->addElement($mensagem);
        
        $submit = $this->addElement('submit','submit',array('label' => 'Salvar Mensagem'));
		
	}
}
?>