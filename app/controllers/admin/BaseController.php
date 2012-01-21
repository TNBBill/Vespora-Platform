<?php
namespace vespora\controllers\admin;


use hydrogen\log\Log;

use hydrogen\controller\Controller;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\models\UserModel;
use vespora\helpers\viewHelper;
use vespora\helpers\sessionHelper;


/**
 * This is the admin BaseController, it extends the hydrogen controller, and is extended by all other admin controllers.
 * It's chief purpose is to setup items required for other Admin Controllers, and setup things common to all admin
 * controllers.
 *
 */
class BaseController extends Controller {
    /**
     * confirms that user has access (is an admin) to the section. If the user is not logged in, it redirects them to
     * the login page, otherwise it will issue them a 403 error.
     */
    function __construct(){
        parent::__construct();

        //TODO: sanity admin check here!
        if(sessionHelper::isAdmin()){
            viewHelper::$theme = 'admin';
            return;
        }

        if(!sessionHelper::loggedIn()){
            $this->redirect('/user/login&return/admin');
            return;
        }
        $this->redirect('/error/error403');

    }

}

?>
