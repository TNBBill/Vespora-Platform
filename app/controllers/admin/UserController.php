<?php
namespace vespora\controllers\admin;

use vespora\controllers\admin\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\helpers\viewHelper;
use vespora\helpers\sessionHelper;


class UserController extends BaseController
{

    public function index()
    {
        viewHelper::$layout = "home/index";
    }
    /**
     * redirects a logged in user to their profile page, presents a login screen to guests
     *
     * @return null
     */
    public function login(){
        if (sessionHelper::loggedIn())
            return $this->redirect('/user/profile');
        View::setVar('returnURL', '/');
        if(isset($_GET['return']))
            View::setVar('returnURL', ($_GET['return']));
        viewHelper::$layout = 'user/login';
        return null;
    }

    /**
     * gathers data posted back to the server, and attempts to authenticate against the provided credentials
     * should credentials be correct, it starts a session for the user and stores the ID in the session table
     *
     * @return null|void
     */
    public function login_post(){

        if(isset ( $_POST ['username'] ) && $_POST ['password']){
            $userModel = UserModel::getInstance();
            if ($userModel->authenticate ( $_POST ['username'], $_POST ['password'] )) {
                $user = $userModel->getUserByName ( $_POST ['username'] );
                sessionHelper::createSession( $user->id );
                View::setVar ( 'flashMessage', 'User Login Passed' );
                viewHelper::$layout = 'home/index';
                if($_GET['return'])
                    return $this->redirect($_GET['return']);
                return null;
            }
        }
        View::setVar ( 'flashMessage', 'User Login Failed' );
        viewHelper::$layout = 'user/login';
        return null;
    }

}

?>