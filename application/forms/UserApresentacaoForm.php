<?php
class Form_UserApresentacaoForm extends Zend_Form
{
	public function init()
	{
		$id = $this->createElement('hidden','id');
		$id->removeDecorator('label');
		$this->addElement($id);
		
		$titulo = $this->createElement('text','apresentacao_titulo');
		$titulo->setLabel('Título: ');
		$titulo->setRequired(true);
		$titulo->setAttrib('size',40);
		$this->addElement($titulo);
		
		$imagem = $this->createElement('text','imagem');
        $imagem->setLabel('Imagem: ');
        $imagem->setRequired(true);
        $imagem->setAttrib('size',40);
        $this->addElement($imagem);
        
		$apresentacao = $this->createElement('textarea','apresentacao');
		$apresentacao->setLabel('Apresentação: ');
		$apresentacao->setRequired(true);
		$apresentacao->setAttrib('class','mceEditorAdvanced');
		$apresentacao->setAttrib('rows',7);
		$apresentacao->setAttrib('cols',40);
		$this->addElement($apresentacao);
		
		$submit = $this->addElement('submit','submit',array('label' => 'Salvar'));
	}
}

?>