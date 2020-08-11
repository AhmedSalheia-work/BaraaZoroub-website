<?php
    namespace BARAA;
    use BARAA\LIB\FrontController;
    use BARAA\LIB\Language;
    use BARAA\LIB\Template;

    session_start();

    if (!defined('DS')){
        define('DS', DIRECTORY_SEPARATOR);
    }

    require_once 'app' . DS . 'config'.DS.'config.php';
    require_once APP_PATH.DS.'lib'.DS.'autoloader.php';
    $template_parts = require_once 'app' . DS . 'config'.DS.'templateconfig.php';

    if (!isset($_SESSION['lang'])){
        $_SESSION['lang'] = DEFAULT_LANG;
    }
    
    $_SESSION['dir'] = DIRS[$_SESSION['lang']];

    $template = new Template($template_parts);
    $lang = new Language();

    $frontController = new FrontController($template, $lang);
    $frontController->dispatch();

?>