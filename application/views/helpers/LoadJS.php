<?php
class Zend_View_Helper_LoadJS extends Zend_View_Helper_Abstract
{
    public function loadJS ($jsrelpath)
    {
    	$jspath = APPLICATION_PATH . '/../public_html' . $jsrelpath;
    	
    	$handle = opendir($jspath);

	    while (false !== ($file = readdir($handle))) {
	    	$isJS = (strpos($file, '.js') !== false)? true : false;
	    	if ($isJS) $sources[] = $file;
	    }
	    
	    sort($sources);
	    foreach ($sources as $jsfile) {
	    	$this->view->headScript()->appendFile($jsrelpath . '/' . $jsfile);
	    }
	    
    }
    
}

?>