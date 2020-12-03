<?php


namespace BARAA\Models;


class Project_lang extends AbstractModel
{
    public $projId;
    public $name;
    public $name2;
    public $type;
    public $details;
    public $title;

    public static $tableName;
    public static $primaryKey = 'projId';
    public static $tableSchema = array(
    	'projId'    => self::DATA_TYPE_INT,
        'name'    =>  self::DATA_TYPE_STR,
        'name2'    =>  self::DATA_TYPE_STR,
        'type'    =>  self::DATA_TYPE_STR,
        'details'    =>  self::DATA_TYPE_STR,
        'title'    =>  self::DATA_TYPE_STR,
    );

    public function __construct()
    {
        self::$tableName = 'projects_'.$_SESSION['lang'];
    }
}