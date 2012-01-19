<?php
namespace tnb\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;


class ErrorController extends BaseController {
	
	public function error404() {
        $layout = 'error/404';
	}

    public function error403() {
        //For now we're recycling the 404 error.
        $layout = 'error/404';
    }
}

?>