<?php
class Contact_Bootstrap extends Zend_Application_Module_Bootstrap
{
    protected function _initAutoload ()
    {
        $autoLoader = Zend_Loader_Autoloader::getInstance();
        $resourceLoader = new Zend_Loader_Autoloader_Resource(
            array(
                'basePath' => APPLICATION_PATH , 
                'namespace' => '' , 
                'resourceTypes' => array(
                    'form' => array(
                        'path' => 'modules/contact/forms/' , 
                        'namespace' => 'Contact_Forms_')
                )
            )
        );
        
        return $autoLoader;
    }
}
?>