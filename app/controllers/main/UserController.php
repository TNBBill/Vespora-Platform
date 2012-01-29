<?php
namespace vespora\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;
use hydrogen\log\Log;
use vespora\models\sqlBeans\UserBean;
use vespora\models\UserModel;
use vespora\models\SessionModel;
use vespora\helpers\sessionHelper;
use vespora\helpers\viewHelper;
use apiClient;
use apiOauth2Service;
use LightOpenID;


class UserController extends BaseController {

    /**
     * the default call, it will call profile for a logged in user, and login for a guest
     *
     * @return null
     */
    public function index(){
        if (sessionHelper::loggedIn())
            return $this->profile();
        return $this->login();

    }

    public function login(){
        $openid = new LightOpenID('platform.vespora.com/user/SAML');
	    $openid->returnUrl = 'http://platform.vespora.com/user/SAML';
        if(isset($_GET['return']))
            $openid->returnUrl = 'http://platform.vespora.com/user/SAML?return=' . $_GET['return'];
        $openid->required = array('contact/email');
        $openid->optional = array('namePerson', 'namePerson/friendly');
        $openid->id = 'https://www.google.com/accounts/o8/id';
        $this->redirect($openid->authUrl());
    }

    public function SAML(){
	 $openid = new LightOpenID('platform.vespora.com/user/SAML');
	 $openid->returnUrl = 'http://platform.vespora.com/user/SAML';
	if(!$openid->mode != 'cancel'){
		$userModel = UserModel::getInstance();
		$userBean = $userModel->getUserByName($openid->data['openid_ext1_value_contact_email']);


		if(!$userBean){
                // User's not registered, and we need to register.
                $userBean = new UserBean;
                $userBean->username = $openid->data['openid_ext1_value_contact_email'];
                $userBean->realname = $openid->data['openid_ext1_value_contact_email'];
                $userBean->password = 'SSO';
                $userBean->user_permission_id = 2;
                $userBean->email = $openid->data['openid_ext1_value_contact_email'];
                $userBean->insert();
                $userBean = $userModel->getUserByName($openid->data['openid_ext1_value_contact_email']);
            }

		sessionHelper::createSession($userBean->id);
        if(isset($_GET['return']))
            return $this->redirect($_GET['return']);
        $this->redirect('/user/profile');
	}
	else{
		return $this->redirect('/');
	}
 
	return true;

    }




    public function login_old(){
        $client = new apiClient();
        $oauth2 = new apiOauth2Service($client);
        $client->setScopes(array('https://www.googleapis.com/auth/userinfo.profile','https://www.googleapis.com/auth/userinfo.email' ));

        if(isset($_GET['code'])){
            $client->authenticate();

        }

        if($client->getAccessToken()){
            //Logged in
            $userModel = UserModel::getInstance();


            $user = $oauth2->userinfo->get();
            $userBean = $userModel->getUserByName($user['email']);

            if(!$userBean){
                // User's not registered, and we need to register.
                $userBean = new UserBean;
                $userBean->username = $user['email'];
                $userBean->realname = $user['name'];
                $userBean->password = 'SSO';
                $userBean->user_permission_id = 2;
                $userBean->email = $user['email'];
                $userBean->insert();
                $userBean = $userModel->getUserByName($user['id']);
            }

            sessionHelper::createSession($userBean->id);

            $this->redirect('/user/profile');
        }
        else{
            //URL to Login
            View::setVar('AuthURL',$client->createAuthUrl());
            viewHelper::$layout = 'user/googleLogin';
        }

    }




    /**
     * displays the current user's profile
     */
    public function profile(){
        if (sessionHelper::loggedIn()){
            viewHelper::$layout = 'user/profile';
            return;
        }
        $this->redirect('/user/login');
        return;
    }

    /**
     * Logs out the current user, destories their session, and deletes the record from the session table.
     */
    public function logout() {
        sessionHelper::destroySession();
        View::setVar ( 'flashMessage', 'Logout Successful.' );
        $this->redirect('/home/index');
    }






}

?>