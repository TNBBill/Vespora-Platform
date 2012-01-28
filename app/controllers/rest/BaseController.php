<?php
namespace vespora\controllers\rest;

use hydrogen\log\Log;

use hydrogen\controller\Controller;
use hydrogen\view\View;
use hydrogen\config\Config;

use vespora\models\UserModel;
use vespora\helpers\viewHelper;


class BaseController extends Controller {
    protected $_PUT;
    /**
     * Rest base controller constructor, this function contains setup functions
     * for all of the rest controllers. It performs some basic security checks
     * sets the mime type to application/json then sets the theme to rest.
     *
     */
     function __construct(){
        parent::__construct();

        switch($_SERVER['REQUEST_METHOD']){
            case 'PUT':
                // because PHP doesn't recognize the fact that PUT can contain data!
                parse_str(file_get_contents("php://input"),$this->_PUT);
            case 'POST':
            case 'DELETE':

            break;
            case 'GET':

        }
        if ($_SERVER['REQUEST_METHOD']!= 'GET'){
            //Security stuff here.

        }

        header('Content-type: application/json');
        viewHelper::$theme = 'rest';
    }


}

?>