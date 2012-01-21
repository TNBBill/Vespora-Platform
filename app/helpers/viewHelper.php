<?php
namespace vespora\helpers;


class viewHelper{
    public static $layout;
    public static $theme;

    public static function getView(){
        return self::$theme . '/' . self::$layout;
    }

}

?>