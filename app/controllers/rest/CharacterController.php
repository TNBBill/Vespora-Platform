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
     * retrieves and sends the entire character's record to the view, for JSON rendering.
     * @param $id
     * @return bool|void
     */
    public function full_get($id){
        $characterModel = CharacterModel::getInstance();
        $charBean = $characterModel->getCharacter($id);
        if(!$charBean)
            return $this->redirect('/error/notFound.json');
        View::setVar('character', $charBean->toArray(true));
        viewHelper::$layout = 'character/full';
        return true;
    }

    public function stat_put($character, $stat){
        $characterModel = CharacterModel::getInstance();
        $statBean = $characterModel->getStats($character, $stat);
        if(!$statBean)
            return $this->redirect('/error/notFound.json');
        if(!isset($_POST['value']))
            return $this->redirect('/error/noValue.json');
        $statBean->value = $_POST['value'];
        $statBean->update();

        viewHelper::$layout= 'success';
        return true;
    }


}

?>