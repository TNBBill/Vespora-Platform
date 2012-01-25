<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;

/**
 * User: bill
 * Date: 1/25/12
 * Time: 8:02 AM
 */
class CharacterStatBean extends SQLBean
{
    protected static $tableNoPrefix = 'character_stat';
    protected static $tableAlias = 'character_stat';
	protected static $primaryKey = array('character_id','stat');
	protected static $primaryKeyIsAutoIncrement = false;
	
	/**
     * An array of every field in the table.
     */
	protected static $fields = array('character_id', 'stat', 'value');

}

?>