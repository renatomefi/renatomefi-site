<?php

class SearchController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function buildAction()
    {
        $index = Zend_Search_Lucene::create(APPLICATION_PATH . '/indexes');
        
        $mdlPage = new Model_Page();
        $currentPages = $mdlPage->fetchAll();
        
        if ($currentPages->count() > 0) {
        	foreach ($currentPages as $p) {
        		$page = new CMS_Content_Item_Page($p->id);
        		$doc = new Zend_Search_Lucene_Document();
        		
        		$doc->addField(Zend_Search_Lucene_Field::unIndexed('page_id',$page->id));
        		$doc->addField(Zend_Search_Lucene_Field::unIndexed('page_headline',$page->headline));
        		$doc->addField(Zend_Search_Lucene_Field::unIndexed('page_description',$page->description));
        		$doc->addField(Zend_Search_Lucene_Field::unIndexed('page_content',$page->content));
        		
        		$index->addDocument($doc);
        	}
        }
        $index->optimize();
        $this->view->indexSize = $index->numDocs();
    }


}



