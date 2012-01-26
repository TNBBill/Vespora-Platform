<?php
namespace vespora\controllers\rest;

use hydrogen\log\Log;

use hydrogen\controller\Controller;
use hydrogen\view\View;
use hydrogen\config\Config;

use vespora\models\UserModel;
use vespora\helpers\viewHelper;


class BaseController extends Controller {
    //Constructor
    function __construct(){
        parent::__construct();
        if ($_SERVER['REQUEST_METHOD']!= 'GET'){
            //Security stuff here.

        }


        header('Content-type: application/json');
        viewHelper::$theme = 'rest';
    }


}

?>