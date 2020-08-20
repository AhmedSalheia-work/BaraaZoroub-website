<?php


namespace BARAA\Models;


class Projects extends AbstractModel
{
    public $id;
    public $client;
    public $head_img;

    public static $tableName = 'projects';
    public static $primaryKey = 'id';
    public static $tableSchema = array(
        'client'    =>  self::DATA_TYPE_STR,
        'head_img'  =>  self::DATA_TYPE_INT
    );

    public function forHome(){
        unset($this->client);
        $head_img = Imgs::getByPK($this->head_img);
        unset($this->head_img);

        $projDetails = new Project_lang;
        $projDetails = $projDetails::getByPK($this->id);

        $this->name = $projDetails->name;
        $this->name2 = $projDetails->name2;
        $this->type = $projDetails->type;
        $this->img  = $head_img->img;
        $this->img_details = $head_img;

        return $this;
    }

    public function forData(){
        $head_img = Imgs::getByPK($this->head_img);
        unset($this->head_img);

        $projDetails = new Project_lang;
        $projDetails = $projDetails::getByPK($this->id);

        $this->name = $projDetails->title;
        $this->details = $projDetails->details;
        $this->head_img  = $head_img->img;
        $this->img_details = $head_img;

        return $this;
    }
}