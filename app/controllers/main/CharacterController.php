<?php
namespace vespora\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\helpers\viewHelper;
use vespora\models\CharacterModel;
use vespora\models\CampaignModel;
use vespora\helpers\sessionHelper;
use vespora\models\sqlBeans\CharacterBean;
use vespora\models\sqlBeans\CharacterStatBean;
use vespora\models\TypeModel;

class CharacterController extends BaseController
{
     /**
     * Constructor for CharacterController enforces the rule that users must be logged in to access the characters
     * section.
     */
    function __construct(){
        parent::__construct();

        if(!sessionHelper::loggedIn())
            $this->redirect('/user/login&return=/character');
    }



    /**
     * Generates a list of characters created by the current user, or redirects a guest to the login page.
     * @return null|void
     */
    public function index()
    {
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

    /**
     * Handles the post portion of the add page. Inserts a new record into the database
     */
    public function add_post(){
        $campaignModel = CampaignModel::getInstance();
        $characterModel = CharacterModel::getInstance();

        $campaign = $campaignModel->getCampaign($_POST['campaign']);
        $character = new CharacterBean;
        $character->name = $_POST['name'];
        $character->campaign_id = $_POST['campaign'];
        $character->user_id = sessionHelper::$user->id;
        $character->type_id = $campaign->type_id;
        $character->insert();

        $id = $characterModel->getLastId();

        return $this->redirect('/character/edit/' . $id);
    }

    /**
     * Handles editing of a character, including inserting of previously missed stats and skills.
     * @param $id ID of character to edit.
     */
    public function edit($id){
        $characterModel = CharacterModel::getInstance();
        $typeModel = TypeModel::getInstance();
        $charBean = $characterModel->getCharacter($id);
        $typeBean = $charBean->getType();

        if(sessionHelper::$user->id != $charBean->user_id)
            $this->show('/error/error403');

        //Updating stat block
        $availableStats = $typeModel->getStatList($charBean->type_id);
        $currentStats = $charBean->getStats();

        foreach($availableStats as $availableStat){
            $hasStat = false;
            if($currentStats){
                foreach($currentStats as $currentStat){
                   if($availableStat->name == $currentStat->name)
                       $hasStat = true;
                }
            }
            if(!$hasStat){
                $statBean = new CharacterStatBean;
                $statBean->character_id = $id;
                $statBean->stat = $availableStat->stat;
                $statBean->value = $typeBean->defaultStat;
                $statBean->insert();
            }

        }


        View::setVar('character', $charBean->toArray(true));
        viewHelper::$layout = 'character' . $typeBean->view . '/edit';

    }

}

?>