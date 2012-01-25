<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;

/**
 * User: bill
 * Date: 1/25/12
 * Time: 8:02 AM
 */
class CharacterSkillBean extends SQLBean
{
    protected static $tableNoPrefix = 'character_skill';
    protected static $tableAlias = 'character_skill';
	protected static $primaryKey = array('character_id','skill');
	protected static $primaryKeyIsAutoIncrement = false;
	
	/**
     * An array of every field in the table.
     */
	protected static $fields = array('character_id', 'skill', 'value');

}

?>