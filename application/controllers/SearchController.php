<?php

class SearchController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        if($this->_request->getParam('query') != null) {
        	$keywords = $this->_request->getParam('query');
        	$query = Zend_Search_Lucene_Search_QueryParser::parse($keywords);
        	$index = Zend_Search_Lucene::open(APPLICATION_PATH . '/indexes');
        	$hits = $index->find($query);
        	$this->view->results = $hits;
        	$this->view->keywords = $keywords;
        } else {
        	$this->view->results = null;
        }
    }

    public function buildAction()
    {
        $index = new Zend_Search_Lucene(APPLICATION_PATH . '/indexes',true);
        
        $mdlPage = new Model_Page();
        $currentPages = $mdlPage->fetchAll();
		function sanitize($input) {
		    return htmlentities(strip_tags( $input ));
		}
        if ($currentPages->count() > 0) {
        	foreach ($currentPages as $p) {
        		$page = new CMS_Content_Item_Page($p->id);
        		$doc = new Zend_Search_Lucene_Document();
        		// ID da página é a chave
                $doc->addField(Zend_Search_Lucene_Field::Keyword('page_id', 
                    sanitize($page->id)));
                // Nome da página    
                $doc->addField(Zend_Search_Lucene_Field::text('page_name', 
                    sanitize($page->name)));    
                // O cabeçalho entra na localização é guardado no index
                $doc->addField(Zend_Search_Lucene_Field::text('page_headline', 
                    sanitize($page->headline)));
                // A descrição entra na localização é guardado no index
                $doc->addField(Zend_Search_Lucene_Field::text('page_description', 
                    sanitize($page->description)));
                // O conteúdo pode ser procurado mas não será exibido
                $doc->addField(Zend_Search_Lucene_Field::unStored('page_content', 
                    sanitize($page->content)));                                                            
        		$index->addDocument($doc);
        	}
        }
        $index->commit();
        $index->optimize();
        $this->view->indexSize = $index->numDocs();
    }


}



