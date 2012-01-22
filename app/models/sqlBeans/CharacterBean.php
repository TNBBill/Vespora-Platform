<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;
use vespora\models\CampaignModel;
use vespora\models\TypeModel;

/**
 * User: bill
 * Date: 1/19/12
 * Time: 5:14 PM
 */
class CharacterBean extends SQLBean
{
    protected static $tableNoPrefix = 'character';
    protected static $tableAlias = 'character';
    protected static $primaryKey = 'id';
    protected static $primaryKeyIsAutoIncrement = true;

    /**
     * An array of every field in the table.
     */
    protected static $fields = array('id', 'name', 'campaign_id', 'user_id', 'type_id');

    /**
     * Gets the campaign bean assossiated with the current character bean.
     * @return mixed
     */
    public function getCampaign(){
        $campaignModel = CampaignModel::getInstance();
        return $campaignModel->getCampaign($this->campaign_id);
    }

    /**
     * Gets the TypeBean for the current character
     * @return mixed - TypeBean
     */
    public function getType(){
        $typeModel = TypeModel::getInstance();
        return $typeModel->getType($this->type_id);
    }

    /**
     * A function to return the current bean data as an array.
     *
     * @param bool $full flag to fill out the bean, with all of it's linked content.
     * @return array
     */
    public function toArray($full = false){
        if(!$full)
            return parent::toArray();

        $beanData = $this->stored;
        $beanData['campaign'] = $this->getCampaign();
        $beanData['type'] = $this->getType();
        return $beanData;
    }
}

?>