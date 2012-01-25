<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;

/**
 * User: bill
 * Date: 1/19/12
 * Time: 5:16 PM
 */
class TypeBean extends SQLBean
{
    protected static $tableNoPrefix = 'type';
    protected static $tableAlias = 'type';
    protected static $primaryKey = 'id';
    protected static $primaryKeyIsAutoIncrement = true;

    /**
     * An array of every field in the table.
     */
    protected static $fields = array('id', 'name', 'system', 'defaultStat', 'defaultSkill', 'view');

    public function toArray($full = false){
        if(!$full)
            return parent::toArray();
        $retVal = $this->stored;
    }

}

?>