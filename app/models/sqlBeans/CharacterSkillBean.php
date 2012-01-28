<?php
namespace vespora\models\sqlBeans;

use vespora\models\TypeModel;
use hydrogen\sqlbeans\SQLBean;
use hydrogen\database\Query;
use vespora\models\CharacterModel;

/**
 * User: bill
 * Date: 1/25/12
 * Time: 8:02 AM
 */
class CharacterSkillBean extends SQLBean
{
    protected static $tableNoPrefix = 'character_skill';
    protected static $tableAlias = 'character_skill';
	protected static $primaryKey = array('character_id','skill_id');
	protected static $primaryKeyIsAutoIncrement = false;
	
	/**
     * An array of every field in the table.
     */
	protected static $fields = array('character_id', 'skill_id', 'currentValue');

    public function toArray($full = true){
        if(!$full)
            return $this->stored;
        $typeModel = TypeModel::getInstance();
        $charModel = CharacterModel::getInstance();

        $charBean = $charModel->getCharacter($this->character_id);

        $retVal =  $this->stored;
        $skill = $typeModel->getSkillList($charBean->type_id, $this->skill_id);
        $stat =  $typeModel->getStatList($charBean->type_id, $skill[0]->stat_id);
        $retVal['name'] = $skill[0]->skill;
        $retVal['stat'] = $stat[0]->stat;
        return $retVal;
    }

    public function update(){
        $query = new Query('UPDATE');
        $query->table(self::$tableNoPrefix);
        $query->set('currentValue = ?', $this->currentValue);
        $query->where('character_id = ?', $this->character_id);
        $query->where('skill_id = ?', $this->skill_id);
        $stmt = $query->prepare();
        $stmt->execute();
    }

}

?>