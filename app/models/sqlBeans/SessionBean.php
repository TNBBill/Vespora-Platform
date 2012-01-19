<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;

class SessionBean extends SQLBean {
	protected static $tableNoPrefix = 'session';
	protected static $tableAlias = 'session';
	protected static $primaryKey = 'uid';
	protected static $primaryKeyIsAutoIncrement = false;
	
	/**
	 * An array of every field in the table.
	 */
	protected static $fields = array ('uid', 'user_id' );

}
?>