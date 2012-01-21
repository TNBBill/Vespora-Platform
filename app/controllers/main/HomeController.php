<?php
namespace vespora\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\helpers\viewHelper;

class HomeController extends BaseController{
	
	public function index() {
        viewHelper::$layout = "home/index";
	}

}

?>