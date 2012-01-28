<?php
namespace vespora\test\models;

use PHPUnit_Framework_TestCase;
use vespora\models\CampaignModel;
use vespora\models\sqlBeans\CampaignBean;

class CampaignTest extends PHPUnit_Framework_TestCase
{
    public function testModel()
    {
        $campaignModel = CampaignModel::getInstance();

        //Checking to make sure we got a valid object
        $this->assertNotNull($campaignModel);

        $campaignBean = $campaignModel->getCampaign(1);

        $this->assertTrue($campaignBean != false);

        $list = $campaignModel->getCampaignList();
        $items = count($list);
        $this->assertGreaterThan(0, $items);

    }

    public function testBeanValues(){
        $campaignModel = CampaignModel::getInstance();
        $campaignBean = $campaignModel->getCampaign(1);

        $this->assertEquals($campaignBean->id, 1);
        $this->assertEquals($campaignBean->type_id, 1);
        $this->assertEquals($campaignBean->name, 'Sample');
    }

    public function testInsertAndDelete(){
        $campaignBean = new CampaignBean;

        $campaignBean->type_id = 1;
        $campaignBean->name = "PHPUnit";
        $campaignBean->insert();

        $campaignModel = CampaignModel::getInstance();
        $list = $campaignModel->getCampaignList();
        $otherBean =array_pop($list);

        $campaignBean->id = $otherBean->id;
        $this->assertEquals($campaignBean->id, $otherBean->id);
        $this->assertEquals($campaignBean->type_id, $otherBean->type_id);
        $this->assertEquals($campaignBean->name, $otherBean->name);

        $otherBean->delete();

        $campaignBean = $campaignModel->getCampaign(0);
        $this->assertFalse($campaignBean);
    }
}
?>
