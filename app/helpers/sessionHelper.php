<?php
namespace vespora\helpers;

use vespora\models\SessionModel;
use vespora\models\UserModel;

class sessionHelper{
    private static $started = false;
    public static $user;
    public static $userPermission;
    public static $sessionID;

    /**
     * Function to check if the current user is an admin.
     *
     * @static
     * @return bool True if the current logged in user is an admin.
     */
    public static function isAdmin(){
        return self::$userPermission->admin;
    }

    /**
     * Function to see if there is a user logged in, or if the guest account is being used.
     *
     * @static
     * @return bool True if a user is logged in, false otherwise.
     */
    public static function loggedIn(){
        return self::$user->id > 1;
    }

    public static function start(){
        if (!self::$started){
            session_start();
            self::$sessionID = session_id();
            self::setupSession();
        }
        self::$started = true;
    }
    /**
     * Function responsible for setting up the Session variable. This checks the session table to see if there's
     * a record located within it, and pulls the UserID from that, if available. Otherwise it sets the userID to 1
     * which is always the guest account. It then grabs the permissions for the given user.
     *
     */
    public static function setupSession(){
        $sessionModel = SessionModel::getInstance();
        $sessionBean = $sessionModel->getSession(self::$sessionID);

        $userID = 1;

        if($sessionBean != false){
            $userID = $sessionBean->user_id;
        }

        $userModel = UserModel::getInstance();
        self::$user = $userModel->getUser($userID);
        self::$userPermission = $userModel->getPermissions($userID);


    }

}

?>