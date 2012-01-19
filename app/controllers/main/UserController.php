<?php
namespace vespora\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;
use hydrogen\log\Log;
use vespora\models\sqlBeans\UserBean;
use vespora\models\UserModel;
use vespora\models\SessionModel;


class UserController extends BaseController {

    /**
     * the default call, it will call profile for a logged in user, and login for a guest
     *
     * @return null
     */
    public function index(){
        //if ($this->session->isLoggedIn())
            //return $this->profile();
        return $this->login();

    }

    /**
     * redirects a logged in user to their profile page, presents a login screen to guests
     *
     * @return null
     */
    public function login(){
        //if ($this->session->isLoggedIn())
        //    return $this->redirect('/user/profile');
        $GLOBALS['layout'] = 'user/login';
        return null;
    }

    /**
     * gathers data posted back to the server, and attempts to authenticate against the provided credentials
     * should credentials be correct, it starts a session for the user and stores the ID in the session table
     *
     * @return null
     */
    public function login_post(){
        $layout = 'user/login';
        if(isset ( $_POST ['username'] ) && $_POST ['password']){
            $userModel = UserModel::getInstance();
            if ($userModel->authenticate ( $_POST ['username'], $_POST ['password'] )) {
                $user = $userModel->getUserByName ( $_POST ['username'] );
                $this->createSession( $user->id );
                View::setVar ( 'flashMessage', 'User Login Passed' );
                $GLOBALS['layout'] = 'home/index';
                //if ($this->session->isAdmin())
                //    return $this->redirect('/admin');
                return null;
            }
        }
        View::setVar ( 'flashMessage', 'User Login Failed' );
        return null;
    }

    /**
     * displays the current user's profile
     * @return null
     */
    public function profile(){
        //if ($this->session->isLoggedIn()){
        $GLOBALS['layout'] = 'user/profile';
            return null;
        //}
        $this->redirect('/user/login');
        return null;
    }

    /**
     * Logs out the current user, destories their session, and deletes the record from the session table.
     */
    public function logout() {
        $this->destroySession();
        View::setVar ( 'flashMessage', 'Logout Successful.' );
        $this->redirect('home/index');
    }



    /** Session controlling functions */

    /**
     * Creates a session for the user, with the specified user ID.
     * @param $userID
     */
    private function createSession($userID){
        Log::info("Creating Session - User ID: $userID | Session ID: " . $this->session->sessionID);
        SessionModel::getInstance()->insertSession($userID,   $this->session->sessionID);
        $this->setupSession();

    }

    /**
     * destroies the current user's session.
     * @return bool
     */
    private function destroySession(){
        $sessionModel = SessionModel::getInstance();
        $sessionModel->deleteSession($this->session->sessionID);
        return session_destroy();
    }
}

?>