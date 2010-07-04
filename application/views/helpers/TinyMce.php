<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category  Sozfo
 * @package   Sozfo_Form
 * @copyright Copyright (c) 2009 Soflomo V.O.F. (http://www.soflomo.com)
 * @license   http://framework.zend.com/license/new-bsd     New BSD License
 */

/**
 * Sozfo View Helper TinyMce
 *
 * Used to render javascript for the TinyMce textarea conversion.
 * @author jurian
 * 
 * Render with profiles in .ini file
 * @author Renato Mendes Figueiredo
 *
 */
class Zend_View_Helper_TinyMce extends Zend_View_Helper_Abstract
{
    protected $_enabled = false;
    
    protected $_config;
    protected $_configFile;
    protected $_configPath;
    protected $_scriptPath;
    protected $_scriptFile;

    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (!method_exists($this, $method)) {
            throw new Zend_Exception('Invalid tinyMce property');
        }
        $this->$method($value);
    }

    public function __get($name)
    {
        $method = 'get' . $name;
        if (!method_exists($this, $method)) {
            throw new Zend_Exception('Invalid tinyMce property');
        }
        return $this->$method();
    }
    
    public function setConfig($path, $file)
    {
        $this->_configPath = $path;
        $this->_configFile = $file;

        
        return $this;
    }

    public function TinyMce ()
    {
        return $this;
    }

    public function setScriptPath ($path)
    {
        $this->_scriptPath = rtrim($path,'/');
        return $this;
    }

    public function setScriptFile ($file)
    {
        $this->_scriptFile = (string) $file;
    }
    
    public function setConfigPath ($path)
    {
        $this->_configPath = rtrim($path,'/');
        return $this;
    }
    
    public function setConfigFile ($file)
    {
    	$this->_configFile = (string) $file;
    }

    public function render()
    {
        if (false === $this->_enabled) {
        	$this->_renderOptions();
            $this->_renderScript();
            $this->_renderEditor();
        }
        $this->_enabled = true;
    }
    
    protected function _renderOptions()
    {
        $config = new Zend_Config_Ini($this->_configPath . '/' . $this->_configFile);
        $profiles = array_keys($config->getExtends());
        $methods = get_class_methods($this);
        
        foreach ($profiles as $profile) {
            $this->_config[$profile] = array();
            foreach ($config->get($profile) as $name => $value) {
                $method = 'set' . ucfirst($name);
                if (in_array($method, $methods)) {
                    $this->$method($value);
                } else {
                    if ($value == "true" || $value == "false") {
                	   $this->_config[$profile][] = $name . ": " . $value;
                    } else {
                       $this->_config[$profile][] = $name . ": " . '"' . $value . '"';
                    }
                }
            }
        }
        return $this;
    }
    
    protected function _renderScript ()
    {
        $script = $this->_scriptPath . '/' . $this->_scriptFile;

        $this->view->headScript()->appendFile($script);
        return $this;
    }

    protected function _renderEditor ()
    {
        $script = "";

        while ($profile = current($this->_config)) {

        	$params = array();

            foreach ($profile as $value) {
            	$params[] = $value;
            }
        	$params[] = 'editor_selector: "mceEditor' . ucfirst(key($this->_config)) . '"';

        	$script .= 'tinyMCE.init({' . PHP_EOL;
        	$script .= implode(',' . PHP_EOL, $params) . PHP_EOL;
        	$script .= '});';
        	
        	next($this->_config);
        }

        $this->view->headScript()->appendScript($script);
        return $this;
    }
}