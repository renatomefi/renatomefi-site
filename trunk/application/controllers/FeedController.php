<?php

class FeedController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function rssAction()
    {
        $feedArray = array();
        $feedArray['title'] = 'Recent Pages';
        $feedArray['link'] = $this->view->baseUrl();
        $feedArray['published'] = Zend_Date::now()->toString(Zend_Date::TIMESTAMP);
        $feedArray['charset'] = 'UTF8';
        
        $mdlPage = new Model_Page();
        $recentPages = $mdlPage->getRecentPages();
        
        if (is_array($recentPages) && count($recentPages) > 0) {
        	foreach ($recentPages as $page) {
        		$entry = array();
        		$entry['guid'] = $page->id;
        		$entry['title'] = $page->headline;
        		$entry['link'] = $this->view->baseUrl() . '/page/open/title/' . $page->name;
        		$entry['description'] = $page->description;
        		$entry['content'] = $page->content;
        		
        		$feedArray['entries'][] = $entry;
        	}
        }
        
        $feed = Zend_Feed::importArray($feedArray,'rss');
        
        $this->_helper->viewRenderer->setNoRender();
        $this->_helper->layout->disableLayout();
        $feed->send();
    }


}



