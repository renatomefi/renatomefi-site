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
 */
class Zend_View_Helper_TinyMce extends Zend_View_Helper_Abstract
{
    protected $_enabled = false;
    protected $_defaultScript = '/util/js/tiny_mce/tiny_mce.js';

    protected $_supported = array(
        'mode'      => array('textareas', 'specific_textareas', 'exact', 'none'),
        'theme'     => array('simple', 'advanced'),
        'format'    => array('html', 'xhtml'),
        'languages' => array('en'),
        'plugins'   => array('style', 'layer', 'table', 'save',
                             'advhr', 'advimage', 'advlink', 'emotions',
                             'iespell', 'insertdatetime', 'preview', 'media',
                             'searchreplace', 'print', 'contextmenu', 'paste',
                             'directionality', 'fullscreen', 'noneditable', 'visualchars',
                             'nonbreaking', 'xhtmlxtras', 'imagemanager', 'filemanager','template'));

    protected $_config = array('mode'  =>'specific_textareas',
                               'element_format' => 'html',);
    protected $_configSimple = array('theme' => 'simple',
                               'editor_selector' => 'mceEditorSimple');
    protected $_configAdvanced = array('theme' => 'advanced',
                               'editor_selector' => 'mceEditorAdvanced');
        
    protected $_scriptPath;
    protected $_scriptFile;
    protected $_useCompressor = false;

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

    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            } else {
                $this->_config[$key] = $value;
            }
        }
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

    public function setCompressor ($switch)
    {
        $this->_useCompressor = (bool) $switch;
        return $this;
    }

    public function render()
    {
        if (false === $this->_enabled) {
            $this->_renderScript();
            $this->_renderCompressor();
            $this->_renderEditor();
        }
        $this->_enabled = true;
    }

    protected function _renderScript ()
    {
        if(null === $this->_scriptFile) {
            $script = $this->_defaultScript;
        } else {
            $script = $this->_scriptPath . '/' . $this->_scriptFile;
        }

        $this->view->headScript()->appendFile($script);
        return $this;
    }

    protected function _renderCompressor ()
    {
        if (false === $this->_useCompressor) {
            return;
        }

        if (isset($this->_config['plugins']) && is_array($this->_config['plugins'])) {
            $plugins = $this->_config['plugins'];
        } else {
            $plugins = $this->_supported['plugins'];
        }
        
        $script = 'tinyMCE_GZ.init({' . PHP_EOL
                . 'themes: "' . implode(',', $this->_supported['theme']) . '",' . PHP_EOL
                . 'plugins: "'. implode(',', $plugins) . '",' . PHP_EOL
                . 'languages: "' . implode(',', $this->_supported['languages']) . '",' . PHP_EOL
                . 'disk_cache: true,' . PHP_EOL
                . 'debug: false' . PHP_EOL
                . '});';

        $this->view->headScript()->appendScript($script);
        return $this;
    }

    protected function _renderEditor ()
    {
        $script = "";
        $paramsSimple = array();
        $paramsAdvanced = array();
        
        foreach ($this->_config as $name => $value) {
            if (is_array($value)) {
                $value = implode(',', $value);
            }
            if (!is_bool($value)) {
                $value = '"' . $value . '"';
            }
            $paramsSimple[] = $name . ': ' . $value;
            $paramsAdvanced[] = $name . ': ' . $value;
        }
        
        foreach ($this->_configSimple as $name => $value) {
            if (is_array($value)) {
                $value = implode(',', $value);
            }
            if (!is_bool($value)) {
                $value = '"' . $value . '"';
            }
            $paramsSimple[] = $name . ': ' . $value;
        }
        
        foreach ($this->_configAdvanced as $name => $value) {
            if (is_array($value)) {
                $value = implode(',', $value);
            }
            if (!is_bool($value)) {
                $value = '"' . $value . '"';
            }
            $paramsAdvanced[] = $name . ': ' . $value;
        }
        
        $script .= 'tinyMCE.init({' . PHP_EOL;
        $script .= implode(',' . PHP_EOL, $paramsSimple) . PHP_EOL;
        $script .= '});';
        
        $script .= 'tinyMCE.init({' . PHP_EOL;
        $script .= implode(',' . PHP_EOL, $paramsAdvanced) . PHP_EOL;
        $script .= '});';
        $this->view->headScript()->appendScript($script);
        return $this;
    }
}