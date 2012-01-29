<?php
namespace vespora\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\helpers\viewHelper;

use vespora\models\CampaignModel;
use vespora\models\CharacterModel;

class CampaignController extends BaseController
{

    public function index()
    {
        $campaignModel = CampaignModel::getInstance();
        $campaignList = $campaignModel->getCampaignList();
        $campaigns = array();
        foreach($campaignList as $campaign){
            $campaigns[] = $campaign->toArray();
        }
        View::setVar('campaigns', $campaigns);


        viewHelper::$layout = "campaign/index";
    }

    public function characters($id){
        $characterModel = CharacterModel::getInstance();
        $charBeans = $characterModel->getCampaignCharacterList($id);
        $characters= array();
        if($charBeans){

            foreach($charBeans as $char){
                $characters[] = $char->toArray(true);
            }

        }

        View::setVar('characters', $characters);
        viewHelper::$layout = "campaign/characters";

        return null;
    }

}

?>