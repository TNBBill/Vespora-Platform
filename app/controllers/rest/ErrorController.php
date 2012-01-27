<?php
namespace vespora\controllers\rest;

use vespora\controllers\rest\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\helpers\viewHelper;
use vespora\helpers\sessionHelper;


class ErrorController extends BaseController
{
    /**
     * returns a JSON object with a 404 error. 
     */
    public function notFound_get(){
        header("Status: 404 Not Found", true, 404);
        viewHelper::$layout = 'error/notFound';
    }

    /**
     * returns a JSON object with a 400 error, with the text 'Not supported call' 
     */
    public function notSupported_get(){
        header("Status: 400 Bad Request", true, 400);
        viewHelper::$layout = 'error/notSupported';
    }

    /**
     * returns a JSON object with a 400 error, with the text 'expected value not found' 
     */
    public function noValue_get(){
        header("Status: 400 Bad Request", true, 400);
        viewHelper::$layout = 'error/notValue';
    }


}

?>