<?php

namespace BARAA\Controllers;

use BARAA\LIB\FrontController;

class AbstractController
{
    private $_controller = 'index';
    private $_action = 'default';
    protected $_params = array();
    protected $_template;
    protected $_lang;

    protected $_data = [];

    public function setController($controller)
    {
        $this->_controller = $controller;
    }

    public function setAction($action)
    {
        $this->_action = $action;
    }

    public function setParams($params)
    {
        $this->_params = $params;
    }

    public function setTemplate($template)
    {
        $this->_template = $template;
    }

    public function setLang($lang)
    {
        $this->_lang = $lang;
    }

    public function notFoundAction(){
        $this->_lang->load('notfound.notfound');
        $this->_view();
    }

    protected function _view($block='',$another=''){
        if ($this->_action == FrontController::NOT_FOUND_ACTION){

            $view = VIEWS_PATH . 'notfound' . DS . 'notfound.view.php';

            $this->_data = array_merge($this->_data, $this->_lang->get());
            $this->_template->setActionViewFile($view);
            $this->_template->setAppData($this->_data);

            $this->_template->renderApp('header,wraperstart,footer,loader');

        }else{
            $view = VIEWS_PATH . $this->_controller . DS . $this->_action. '.view.php';
            if (file_exists($view)){
                $this->_data = array_merge($this->_data, $this->_lang->get());

                $this->_template->setActionViewFile($view);
                $this->_template->setAppData($this->_data);

                $this->_template->renderApp($block,$another);
            }else{

                $view = VIEWS_PATH . 'notfound' . DS . 'noview.view.php';

                $this->_data = array_merge($this->_data, $this->_lang->get());
                $this->_template->setActionViewFile($view);
                $this->_template->setAppData($this->_data);
    
                $this->_template->renderApp('header,wraperstart,footer,loader');
                
            }
        }

    }
}