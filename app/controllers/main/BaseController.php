<?php
namespace vespora\controllers\main;

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

        viewHelper::$theme = 'main';
    }

    protected function show($url){
        $GLOBALS['router']->start($url);
    }



}

?>