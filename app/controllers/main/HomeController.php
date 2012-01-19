<?php
namespace tnb\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;

class HomeController extends BaseController{
	
	public function index() {
        $layout = "home/index";
	}

}

?>