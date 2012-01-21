<?php
namespace vespora\controllers\main;

use vespora\controllers\main\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\helpers\viewHelper;

use vespora\models\CampaignModel;

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

}

?>