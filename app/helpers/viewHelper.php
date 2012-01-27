<?php
namespace vespora\helpers;


class viewHelper{
    public static $layout;
    public static $theme;
	
    /**
     * Function to return the view name.
     *
     * @static
     * @return mixed returns the view name.
     */
    public static function getView(){
        return self::$theme . '/' . self::$layout;
    }

}

?>