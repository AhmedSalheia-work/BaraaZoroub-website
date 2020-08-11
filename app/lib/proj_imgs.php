<?php


namespace BARAA\LIB;


use BARAA\Models\Imgs;

class Proj_imgs extends \BARAA\Models\AbstractModel
{
    public $id;
    public $prodId;
    public $imgId;

    public static $tableName = 'proj_img';
    public static $primaryKey = 'id';
    public static $tableSchema = array(
        'prodId'    =>  self::DATA_TYPE_INT,
        'imgId'     =>  self::DATA_TYPE_INT
    );

    public function getByProdId(){
        self::$primaryKey = 'prodId';
        $prods = self::getByPK($this->prodId);

        $prodat = [];
        if ($prods != false){
            if (is_array($prods)) {
                foreach ($prods as $prod) {
                    $imgs = Imgs::getByPK($prod->imgId);
                    $prod->img = $imgs->img;
                    array_push($prodat, $prod);
                }
            } else {
                $imgs = Imgs::getByPK($prods->imgId);
                $prods->img = $imgs->img;
                array_push($prodat, $prods);
            }
        }

        $this->returnDefaults();

        return $prodat;
    }

    public function returnDefaults(){
        self::$primaryKey = 'id';
    }
}