<?php
namespace vespora\controllers\admin;

use vespora\controllers\admin\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\helpers\viewHelper;


/**
 * This is the admin home controller, mostly responsible for the landing page in the admin section.
 *
 * @package tnb\controllers\admin\HomeController
 */
class HomeController extends BaseController{

    /**
     * index, is the default function. It provides the analytics key to the view, so that it can pull in pwik data.
     * to display to the user.
     */
    public function index() {
        viewHelper::$layout = "home/index";
    }
}

?>