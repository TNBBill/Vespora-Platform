<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;
use vespora\models\TypeModel;

/**
 * User: bill
 * Date: 1/25/12
 * Time: 8:02 AM
 */
class TypeSkillRanksBean extends SQLBean
{
    protected static $tableNoPrefix = 'type_skillRanks';
    protected static $tableAlias = 'type_skillRanks';
	protected static $primaryKey = 'id';
	protected static $primaryKeyIsAutoIncrement = true;
	
	/**
     * An array of every field in the table.
     */
	protected static $fields = array('id', 'type_id', 'rank');

}

?>