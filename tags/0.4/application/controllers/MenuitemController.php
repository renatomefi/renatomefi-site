<?php
class MenuitemController extends Zend_Controller_Action
{
    public function init()
    {
        /* Initialize action controller here */
    }

	public function indexAction()
	{
	   $menu = $this->_request->getParam('menu');
	   $mdlMenu = new Model_Menu();
	   $mdlMenuitem = new Model_Menuitem();
	   $this->view->menu = $mdlMenu->find($menu)->current();
	   $this->view->items = $mdlMenuitem->getItemsByMenu($menu);
	}
	
	public function addAction()
	{
	    $menu = $this->_request->getParam('menu');
	    $mdlMenu = new Model_Menu();
	    $this->view->menu = $mdlMenu->find($menu)->current();
	    $frmMenuitem = new Form_MenuitemForm();
	    
	    if ($this->_request->isPost()) {
	        if ($frmMenuitem->isValid($_POST)) {
	            $data = $frmMenuitem->getValues();
	            $mdlMenuitem = new Model_Menuitem();
	            
	            $mdlMenuitem->addItem(
	               $data['menu_id'],
	               $data['label'],
	               $data['page_id'],
	               $data['link']);

	            $this->_request->setParam('menu', $data['menu_id']);

	            $this->_forward('index');
	        }
	    }
	    $frmMenuitem->setAction('/menuitem/add');
	    $frmMenuitem->populate(array('menu_id' => $menu));
	    $this->view->form = $frmMenuitem;
	}
	
	public function moveAction()
	{
	    $id = $this->_request->getParam ( 'id' );
	    $direction = $this->_request->getParam ( 'direction' );
	    $mdlMenuitem = new Model_Menuitem ( );
	    $Menuitem = $mdlMenuitem->find ( $id )->current ();
	    if ($direction == 'up') {
	        $mdlMenuitem->moveUp ( $id );
	    } elseif ($direction == 'down') {
	        $mdlMenuitem->moveDown ( $id );
	    }
	    $this->_request->setParam ( 'menu', $Menuitem->menu_id );
	    $this->_forward ( 'index' );
	}
	
	public function updateAction ()
	{
	    $id = $this->_request->getParam('id');
	    // fetch the current item
	    $mdlMenuitem = new Model_Menuitem();
	    $currentMenuitem = $mdlMenuitem->find($id)->current();
	    // fetch its menu
	    $mdlMenu = new Model_Menu();
	    $this->view->menu = $mdlMenu->find($currentMenuitem->menu_id)->current();
	    // create and populate the form instance
	    $frmMenuitem = new Form_MenuitemForm();
	    $frmMenuitem->setAction('/menuitem/update');
	    // process the postback
	    if ($this->_request->isPost()) {
	        if ($frmMenuitem->isValid($_POST)) {
	            $data = $frmMenuitem->getValues();
	            $mdlMenuitem->updateItem($data['id'], $data['label'],
	                $data['page_id'], $data['link']);
	            $this->_request->setParam('menu', $data['menu_id']);
	            return $this->_forward('index');
	        }
	    } else {
	        $frmMenuitem->populate($currentMenuitem->toArray());
	    }
	    $this->view->form = $frmMenuitem;
	}
	
	public function deleteAction() {
	    $id = $this->_request->getParam ( 'id' );
	    $mdlMenuitem = new Model_Menuitem ( );
	    $currentMenuitem = $mdlMenuitem->find ( $id )->current ();
	    $mdlMenuitem->deleteItem ( $id );
	    $this->_request->setParam ( 'menu', $currentMenuitem->menu_id );
	    $this->_forward ( 'index' );
	}



}