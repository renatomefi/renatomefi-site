<?php

class ProfilerController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $db = Zend_Db_Table::getDefaultAdapter();
        $profiler = $db->getProfiler();
        
        $this->view->Profiler = $profiler;
    }


}

