<?php
class Form_BugReportListToolsForm extends Zend_Form
{
    
    public function init()
    {
        $options = array(
            '0' => 'Nenhum',
            'priority' => 'Prioridade',
            'status' => 'Processo',
            'date' => 'Data',
            'url' => 'Endereço',
            'author' => 'Autor'
        );
        
        $sort = $this->createElement('select','sort');
        $sort->setLabel('Organizar registros:');
        $sort->addMultiOptions($options);
        $this->addElement($sort);
        
        $filterField = $this->createElement('select','filter_field');
        $filterField->setLabel('Filtrar campo:');
        $filterField->addMultiOptions($options);
        $this->addElement($filterField);
        
        $filter = $this->createElement('text','filter');
        $filter->setLabel('Valor do filtro:');
        $filter->setAttrib('size',40);
        $this->addElement($filter);
        
        $this->addElement('submit','submit',array('label' => 'Atualizar'));
    }
    
}
?>