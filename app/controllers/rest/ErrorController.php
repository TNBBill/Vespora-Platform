<?php
namespace vespora\controllers\rest;

use vespora\controllers\rest\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\helpers\viewHelper;
use vespora\helpers\sessionHelper;


class ErrorController extends BaseController
{

    public function notFound_get(){
        header("Status: 404 Not Found", true, 404);
        viewHelper::$layout = 'error/notFound';
    }

    public function notSupported_get(){
        header("Status: 400 Bad Request", true, 400);
        viewHelper::$layout = 'error/notSupported';
    }

    public function noValue_get(){
        header("Status: 400 Bad Request", true, 400);
        viewHelper::$layout = 'error/notValue';
    }


}

?>