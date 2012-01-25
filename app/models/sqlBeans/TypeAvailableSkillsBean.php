<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;

/**
 * User: bill
 * Date: 1/25/12
 * Time: 8:02 AM
 */
class TypeAvailableSkillsBean extends SQLBean
{
    protected static $tableNoPrefix = 'type_availableSkills';
    protected static $tableAlias = 'type_availableSkills';
	protected static $primaryKey = array('type_id','skill');
	protected static $primaryKeyIsAutoIncrement = false;
	
	/**
     * An array of every field in the table.
     */
	protected static $fields = array('type_id', 'skill', 'description');

}

?>