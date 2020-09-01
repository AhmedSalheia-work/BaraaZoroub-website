<?php

if (!defined('DS')){
    define('DS', DIRECTORY_SEPARATOR);
}

define('APP_PATH', realpath(dirname(__FILE__)) .DS.'..');
define('VIEWS_PATH', APP_PATH . DS . 'views' . DS);
define('TEMPLATE_PATH', APP_PATH . DS . 'template' . DS);
define('LANG_PATH', APP_PATH . DS . 'languages' . DS);

define('CSS', '/assets/css/');
define('JS', '/assets/js/');
define('IMG', '/assets/images/');
@define('INI', './app/languages/'.$_SESSION['lang'].'/ini/');
define('UPL', '/assets/uploads/');

defined('DATABASE_HOST_NAME')? null : define('DATABASE_HOST_NAME','business29.web-hosting.com'); //business29.web-hosting.com
defined('DATABASE_DB_NAME')? null : define('DATABASE_DB_NAME','progwlfo_baraasite');
defined('DATABASE_USER_NAME')? null : define('DATABASE_USER_NAME','progwlfo_baraa'); //progwlfo_baraa 
defined('DATABASE_PASSWORD')? null : define('DATABASE_PASSWORD','baraa@prography.co '); //baraa@prography.co 
defined('DATABASE_PORT_NUMBER')? null : define('DATABASE_PORT_NUMBER',3306);
defined('DATABASE_CONN_DRIVER')? null : define('DATABASE_CONN_DRIVER',1);

defined('DEFAULT_LANG')? null : define('DEFAULT_LANG','en');
defined('LANGS')? null : define('LANGS',array('en'));
defined('LANGS_full')? null : define('LANGS_full',array('en' => 'English'));

defined('DIRS')? null : define('DIRS',array(
                                                'en'    => 'ltr'
                                            ));