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
	   
	}
}
?>