<?php
namespace vespora\controllers\admin;


use hydrogen\log\Log;

use hydrogen\controller\Controller;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\models\UserModel;


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

        $theme = 'admin';
        Log::info("Theme set to: " . $theme);
        return null;
    }

}

?>
