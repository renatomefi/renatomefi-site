<?php

class MenuController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $menu = $this->_request->getParam('menu');
                $modelMenu = new Model_Menu();
                $this->view->menus = $modelMenu->getMenus();
    }

    public function createAction()
    {
        $formMenu = new Form_MenuForm();
                                        
                                        if ($this->getRequest()->isPost()) {
                                            if ($formMenu->isValid($_POST)) {
                                                $menuName = $formMenu->getValue('name');
                                                $modelMenu = new Model_Menu();
                                                $result = $modelMenu->createMenu($menuName);
                                                if ($result) {
                                                    $this->_forward('index');
                                                }
                                            }
                                        }
                                        $formMenu->setAction('/menu/create');
                                        $this->view->form = $formMenu;
    }

    public function updateAction()
    {
    }

    public function editAction()
    {
        $id = $this->_request->getParam('id');
                
                        $modelMenu = new Model_Menu();
                        $formMenu = new Form_MenuForm();
                        if ($this->getRequest()->isPost()) {
                            if ($formMenu->isValid($_POST)) {
                                $menuName = $formMenu->getValue('name');
                                $id = $formMenu->getValue('id');
                                $result = $modelMenu->updateMenu($id,$menuName);
                                if ($result) {
                                    $this->_forward('index');
                                }
                            }
                        } else {
                            $currentMenu = $modelMenu->find($id)->current();
                            $formMenu->getElement('id')->setValue($currentMenu->id);
                            $formMenu->getElement('name')->setValue($currentMenu->name);
                        }
                        
                        $formMenu->setAction('/menu/edit');
                        $this->view->form = $formMenu;
    }

    public function deleteAction()
    {
        $id = $this->_request->getParam('id');
                $modelMenu = new Model_Menu();
                $modelMenu->deleteMenu($id);
                $this->_forward('index');
    }

    public function renderAction()
    {
        $menu = $this->_request->getParam('menu');
        $modelMenuitem = new Model_Menuitem();
        $menuitems = $modelMenuitem->getItemsByMenu($menu);
        
        if (count($menuitems) > 0) {
        	foreach ($menuitems as $item) {
        		$label = $item->label;
        		if (!empty($item->link)) {
        			$uri = $item->link;
        		} else {
        			$page = new CMS_Content_Item_Page($item->page_id);
        			$uri = '/page/open/title/' . $page->name;
        		}
        		$itemArray[] = array('label' => $label,'uri' => $uri);
        	}
        	$container = new Zend_Navigation($itemArray);
        	$this->view->navigation()->setContainer($container);
        }
    }


}