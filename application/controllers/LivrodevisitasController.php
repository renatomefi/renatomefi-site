<?php

class LivrodevisitasController extends Zend_Controller_Action
{
	public function assinarAction()
	{
		$frmLivro = new Form_LivrodevisitasForm();
		$mdlLivro = new Model_Livrodevisitas();
		
		if ($this->_request->isPost()) {
			if ($frmLivro->isValid($_POST)) {
				$result = $mdlLivro->assinarLivro(
				    $frmLivro->getValue('nome'),
				    $frmLivro->getValue('email'),
				    $frmLivro->getValue('mensagem')
				);
				
				if ($result) {
					$this->_redirect('/livrodevisitas');
				}
			}
		}
		
		$this->view->form = $frmLivro;
	}

}
  
?>