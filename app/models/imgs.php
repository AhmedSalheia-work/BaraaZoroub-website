<?php


namespace BARAA\Models;


class Imgs extends AbstractModel
{
    public $id;
    public $img;

    public static $tableName = 'imgs';
    public static $primaryKey = 'id';
    public static $tableSchema = [
        'img' => self::DATA_TYPE_STR
    ];
}