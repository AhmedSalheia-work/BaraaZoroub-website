<?php


namespace BARAA\LIB;


trait Helper
{
    public function redirect($page){
        session_write_close();
        header('Location: '.$page);
        exit();
    }

    public function randText($num = 10){
        $arr =  str_split(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), $num);
        return $arr[rand(0,count($arr)-2)];
    }
}