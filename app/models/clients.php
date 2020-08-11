<?php


namespace BARAA\Models;


class Clients extends AbstractModel
{
    public $id;
    public $imgId;
    public $title;

    public static $tableName = 'clients';
    public static $primaryKey = 'id';
    public static $tableSchema = array(
        'imgId'     =>  self::DATA_TYPE_INT,
        'title'     =>  self::DATA_TYPE_STR
    );

    public function getImg(){
        $this->img = Imgs::getByPK($this->imgId);
        unset($this->imgId);
        return $this;
    }
}