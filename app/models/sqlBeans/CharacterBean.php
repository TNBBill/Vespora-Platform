<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;
use vespora\models\CampaignModel;
use vespora\models\TypeModel;
use vespora\models\CharacterModel;

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
     * Returns a list of stats assossiated with this character
     * @return mixed Array of CharacterStatBean
     */
    public function getStats(){
        $characterModel = CharacterModel::getInstance();
        return $characterModel->getStats($this->id);
    }


    /**
     * Returns a list of skills  assossiated with this character
     * @return mixed Array of CharacterStatBean
     */
    public function getSkills(){
        $characterModel = CharacterModel::getInstance();
        return $characterModel->getSkills($this->id);
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

        // Character Stats
        $stats = $this->getStats();
        $statArr = array();

        if($stats){
            foreach($stats as $stat){
                $statArr[$stat->stat] = $stat->toArray();
            }
        }
        $beanData['stats'] = $statArr;

        // Character Skills
        $skills = $this->getSkills();
        $skillArr = array();

        if($skills){
            foreach($skills as $skill){
                $name = explode(' ',$skill->skill);
                $skillArr[$name[0]] = $skill->toArray();
            }
        }
        $beanData['skills'] = $skillArr;


        return $beanData;
    }
}

?>