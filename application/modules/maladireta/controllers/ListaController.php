<?php
class Maladireta_ListaController extends Zend_Controller_Action
{
	public function indexAction()
	{
		
	}
	
	public function createAction()
	{
	   $frmLista = new Maladireta_Form_Lista();
       
	   $this->view->form = $frmLista;
	}
	
	public function editAction()
	{
		
	}
	
	public function deleteAction()
	{
		
	}
}
?>