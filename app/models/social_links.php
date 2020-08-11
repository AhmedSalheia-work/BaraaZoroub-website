<?php


namespace BARAA\Models;


class Social_links extends AbstractModel
{
    public $id;
    public $link;

    public static $tableName = 'social_links';
    public static $primaryKey = 'id';
}