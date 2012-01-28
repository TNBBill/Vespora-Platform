<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;
use vespora\models\TypeModel;

/**
 * User: bill
 * Date: 1/25/12
 * Time: 8:02 AM
 */
class TypeAvailableSkillsBean extends SQLBean
{
    protected static $tableNoPrefix = 'type_availableSkills';
    protected static $tableAlias = 'type_availableSkills';
	protected static $primaryKey = 'id';
	protected static $primaryKeyIsAutoIncrement = true;
	
	/**
     * An array of every field in the table.
     */
	protected static $fields = array('id', 'type_id', 'skill', 'description', 'stat_id');

    public function toArray($full = true){
        if(!$full)
            return $this->stored;
        $typeModel = TypeModel::getInstance();

        $retVal =  $this->stored;
        $stat = $typeModel->getStatList($this->type_id, $this->stat_id);

        $retVal['stat'] = $stat[0]->toArray();

        return $retVal;
    }

}

?>