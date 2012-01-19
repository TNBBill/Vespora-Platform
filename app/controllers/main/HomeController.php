<?php
namespace vespora\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;

class HomeController extends BaseController{
	
	public function index() {
        $GLOBALS['layout'] = "home/index";
	}

}

?>