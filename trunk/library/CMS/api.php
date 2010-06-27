<?php
class CMS_Api
{
	
	protected function _validateKey ($apiKey)
	{
		if ($apiKey == 'test') {
			return true;
		} else {
			return false;
		}
	}
	
	public function search ($apiKey,$keywords)
	{
	   if (!$this->_validateKey($apiKey)) {
	       return array('error' => 'invalid api key', 'status' => false );	
	   }
	   
	   $query = Zend_Search_Lucene_Search_QueryParser::parse($keywords);
	   $index = Zend_Search_Lucene::open(APPLICATION_PATH . '/indexes');
	   $hits = $index->find($query);
	   
	   if (is_array($hits) && count($hits) > 0) {
	       $response['hits'] = count($hits);
	       foreach ($hits as $page) {
	           $pageObj = new CMS_Content_Item_Page($page->page_id);
	           $response['results']['page_' . $page->page_id] = $pageObj->toArray();
	       }
	   } else {
	       $response['hits'] = 0;
	   }
	}
	
	public function createPage ($apiKey,$name,$headline,$description,$content)
	{
		if (!$this->_validateKey($apiKey)) {
			return array('error' => 'invalid api key', 'status' => false );
		}
		
		$itemPage = new CMS_Content_Item_Page();
		$itemPage->name = $name;
		$itemPage->headline = $headline;
		$itemPage->description = $description;
		$itemPage->content = $content;
		
		$itemPage->save();
		
		return $itemPage->toArray();
	}
}
?>