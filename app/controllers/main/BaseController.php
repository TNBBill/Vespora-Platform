<?php
namespace vespora\controllers\main;

use hydrogen\log\Log;

use hydrogen\controller\Controller;
use hydrogen\view\View;
use hydrogen\config\Config;

use vespora\models\UserModel;


class BaseController extends Controller {
    //Constructor
    function __construct(){
        parent::__construct();

        $theme = 'main';
        Log::info("Theme set to: " .$theme);
    }



}

?>