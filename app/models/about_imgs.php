<?php


namespace BARAA\Models;


class About_imgs extends AbstractModel
{
    public $id;
    public $imgId;
    public $title;

    public static $tableName = 'about_imgs';
    public static $primaryKey = 'id';
    public static $tableSchema = [
        'imgId'  =>  self::DATA_TYPE_INT,
        'title'  =>  self::DATA_TYPE_STR
    ];

    public function getImg(){
        $img = Imgs::getByPK($this->imgId);
        $this->img = $img;
        unset($this->imgId);

        return $this;
    }
}