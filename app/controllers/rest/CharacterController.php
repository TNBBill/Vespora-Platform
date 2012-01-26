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

    public function full_get($id){
        $characterModel = CharacterModel::getInstance();
        $charBean = $characterModel->getCharacter($id);
        if(!$charBean)
            return $this->redirect('/error/error404');
        View::setVar('character', $charBean->toArray(true));
        viewHelper::$layout = 'character/full';
        return true;
    }


}

?>