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

        $prods = new Proj_imgs();
        $prods = $prods->get('SELECT proj_img.id, proj_img.prodId,proj_img.imgId, imgs.img FROM proj_img INNER JOIN imgs ON proj_img.imgId = imgs.id WHERE proj_img.prodId="'.$this->prodId.'" ORDER BY imgs.img ASC');
        
        $prodat = [];
        
        if ($prods != false){
            if (is_array($prods)) {
             
                foreach ($prods as $prod) {
                    
                    array_push($prodat, $prod);
                    
                }

            }
        }

        $this->returnDefaults();

        return $prodat;
    }

    public function returnDefaults(){
        self::$primaryKey = 'id';
    }
}