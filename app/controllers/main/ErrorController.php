<?php
namespace vespora\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;


class ErrorController extends BaseController {
	
	public function error404() {
        $GLOBALS['layout'] = 'error/404';
	}

    public function error403() {
        //For now we're recycling the 404 error.
        $GLOBALS['layout'] = 'error/404';
    }
}

?>