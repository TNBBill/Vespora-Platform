<?php
namespace vespora\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;
use vespora\helpers\viewHelper;


class ErrorController extends BaseController {
	
	public function error404() {
        $this->redirect('/status/notFound');
	}

}

?>