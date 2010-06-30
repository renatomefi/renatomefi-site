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

    public function renderAction ()
    {
        $menu = $this->_request->getParam('menu');

        $bootstrap = $this->getInvokeArg('bootstrap');
        $cache = $bootstrap->getResource('cache');
        $cacheKey = 'menu_' . $menu;

        $container = $cache->load($cacheKey);
        if (! $container) {
            $mdlMenuItems = new Model_Menuitem();
            $menuItems = $mdlMenuItems->getItemsByMenu($menu);
            if (count($menuItems) > 0) {
                foreach ($menuItems as $item) {
                    $tags[] = 'menu_item_' . $item->id;
                    $label = $item->label;
                    if (! empty($item->link)) {
                        $uri = $item->link;
                    } else {
                        $tags[] = 'page_' . $item->page_id;
                        $page = new CMS_Content_Item_Page($item->page_id);
                        $uri = '/page/open/title/' . $page->name;
                    }
                    $itemArray[] = array('label' => $label , 'uri' => $uri);
                }
                $container = new Zend_Navigation($itemArray);

                $cache->save($container, $cacheKey, $tags);
            }
        }
        if ($container instanceof Zend_Navigation_Container) {
            $this->view->navigation()->setContainer($container);
        }
    }     

}