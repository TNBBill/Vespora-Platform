<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;

/**
 * User: bill
 * Date: 1/25/12
 * Time: 8:02 AM
 */
class TypeAvailableStatsBean extends SQLBean
{
    protected static $tableNoPrefix = 'type_availableStats';
    protected static $tableAlias = 'type_availableStats';
	protected static $primaryKey = array('type_id','stat');
	protected static $primaryKeyIsAutoIncrement = false;
	
	/**
     * An array of every field in the table.
     */
	protected static $fields = array('type_id', 'stat', 'description');

}

?>