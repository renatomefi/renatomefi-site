<?php

class Form_BugReportForm extends Zend_Form
{
    public function init() 
    {
        $id = $this->createElement('hidden','id');
        $this->addElement($id);
        
        $author = $this->createElement('text','author');
        $author->setLabel('Nome:');
        $author->setRequired(true);
        $author->setAttrib('size',30);
        $this->addElement($author);
        
        $email = $this->createElement('text','email');
        $email->setLabel('E-mail:');
        $email->setRequired(true);
        $email->addValidator(new Zend_Validate_EmailAddress());
        $email->addFilters(array(
            new Zend_Filter_StringTrim(),
            new Zend_Filter_StringToLower()
            ));
        $email->setAttrib('size',40);
        $this->addElement($email);
        
        $date = $this->createElement('text','date');
        $date->setLabel('Data que o erro ocorreu (dd/mm/aaa):');
        $date->setRequired(true);
        $date->addValidator(new Zend_Validate_Date('DD/MM/YYYY'));
        $date->setAttrib('size',20);
        $this->addElement($date);
        
        $url = $this->createElement('text','url');
        $url->setLabel('Endereço que ocorreu o erro:');
        $url->setRequired(true);
        $url->setAttrib('size',50);
        $this->addElement($url);
        
        $description = $this->createElement('textarea','description');
        $description->setLabel('Descrição do Erro:');
        $description->setRequired(true);
        $description->setAttrib('cols',50);
        $description->setAttrib('rows',4);
        $this->addElement($description);
        
        $priority = $this->createElement('select','priority');
        $priority->setLabel('Prioridade do Erro:');
        $priority->setRequired(true);
        $priority->addMultiOptions(array(
            'low' => 'Baixa',
            'med' => 'Média',
            'high' => 'Alta'            
            ));
        $this->addElement($priority);
        
        $status = $this->createElement('select', 'status');
        $status->setLabel('Status atual:');
        $status->setRequired(TRUE);
        $status->addMultiOptions(array(
            'new' => 'Nova',
            'in_progress' => 'Em progresso',
            'resolved' => 'Resolvida'
            ));
        $this->addElement($status);
        
        $this->addElement('submit','submit',array('label' => 'Enviar'));
        
    }
}

?>