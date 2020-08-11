<?php


namespace BARAA\Models;


class Project_lang extends AbstractModel
{
    public $projId;
    public $name;
    public $type;
    public $details;
    public $title;

    public static $tableName;
    public static $primaryKey = 'projId';
    public static $tableSchema = array(
        'name'    =>  self::DATA_TYPE_STR,
        'type'    =>  self::DATA_TYPE_STR,
        'details'    =>  self::DATA_TYPE_STR,
        'title'    =>  self::DATA_TYPE_STR,
    );

    public function __construct()
    {
        self::$tableName = 'projects_'.$_SESSION['lang'];
    }
}