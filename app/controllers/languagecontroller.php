<?php


namespace BARAA\Controllers;


use BARAA\LIB\Helper;

class LanguageController extends AbstractController
{
    use Helper;
    public function defaultAction(){
        $_SESSION['lang'] = DEFAULT_LANG;
        if (isset($this->_params[0]) && $this->_params[0] !== '' && in_array($this->_params[0], LANGS, true)){
            $_SESSION['lang'] = $this->_params[0];
        }

        $this->redirect($_SERVER['HTTP_REFERER']);
    }
}