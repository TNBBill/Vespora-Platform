<?php
namespace vespora\controllers\rest;

use vespora\controllers\rest\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\helpers\viewHelper;
use vespora\models\CharacterModel;
use vespora\models\CampaignModel;
use vespora\helpers\sessionHelper;
use vespora\models\sqlBeans\CharacterBean;
use vespora\models\sqlBeans\CharacterStatBean;
use vespora\models\sqlBeans\CharacterSkillBean;
use vespora\models\TypeModel;

class CharacterController extends BaseController
{

    /**
     * Generates a list of characters created by the current user, or redirects a guest to the login page.
     * @return null|void
     */
    public function index_get()
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
     * retrieves and sends the entire character's record to the view, for JSON rendering.
     * @param $id
     * @return bool|void
     */
    public function full_get($id){
        $characterModel = CharacterModel::getInstance();
        $charBean = $characterModel->getCharacter($id);
	    $typeBean = $charBean->getType();
        if(!$charBean)
            return $this->redirect('/status/notFound');
        View::setVar('character', $charBean->toArray(true));
        viewHelper::$layout = 'character/' . $typeBean->name . '/full';
        return true;
    }

    /**
     * This function updates the selected stat for the specified character.
     * It then returns a json object indicating the success of the call. 
     * @param $character the ID of the character 
     * @param $stat the Stat of the character
     * @return bool|void
     */
    public function stat_put($character){
        if(!isset($this->_PUT['value']) or !isset($this->_PUT['stat']) )
            return $this->redirect('/status/expectationFailed');

        $characterModel = CharacterModel::getInstance();
        $statBean = $characterModel->getStats($character, $this->_PUT['stat']);

        if(!$statBean)
            return $this->redirect('/status/notFound');

        $statBean->stat_id = $statBean->stat_id;
        $statBean->character_id = $statBean->character_id;
        $statBean->currentValue = $this->_PUT['value'];
        $statBean->update();

        return viewHelper::$layout = 'success';
    }

    public function skill_put($character){
        if(!isset($this->_PUT['value']) or !isset($this->_PUT['skill']) )
            return $this->redirect('/status/expectationFailed');

        $characterModel = CharacterModel::getInstance();
        $skillBean = $characterModel->getSkills($character, $this->_PUT['skill']);

        if(!$skillBean)
            return $this->redirect('/status/notFound');

        $skillBean->currentValue = $this->_PUT['value'];
        $skillBean->update();

        return viewHelper::$layout = 'success';
    }


}

?>