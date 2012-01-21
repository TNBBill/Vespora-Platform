<?php
namespace vespora\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\helpers\viewHelper;
use vespora\models\CharacterModel;
use vespora\models\CampaignModel;
use vespora\helpers\sessionHelper;

class CharacterController extends BaseController
{
    /**
     * Generates a list of characters created by the current user, or redirects a guest to the login page.
     * @return null|void
     */
    public function index()
    {
        if(!sessionHelper::loggedIn())
            return $this->redirect('/user/login&return=/character');

        $characterModel = CharacterModel::getInstance();
        $charBeans = $characterModel->getCharacterList(sessionHelper::$user->id);
        $characters= array();
        if($charBeans){

            foreach($charBeans as $char){
                $characters[] = $char->toArray(true);
            }

        }

        View::setVar('characters', $characters);
        viewHelper::$layout = "character/index";

        return null;
    }

    /**
     * Renders the add page, or redirects the user to the login page.
     * @return null|void
     */
    public function add(){
        if(!sessionHelper::loggedIn())
            return $this->redirect('/user/login&return=/character/add');
        $campaignModel = CampaignModel::getInstance();
        $campaignList = $campaignModel->getCampaignList();
        $campaigns = array();
        foreach($campaignList as $campaign){
            $campaigns[] = $campaign->toArray();
        }
        View::setVar('campaigns', $campaigns);
        viewHelper::$layout = 'character/add';
        return null;
    }

}

?>