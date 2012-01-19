<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;

class UserBean extends SQLBean {
	protected static $tableNoPrefix = 'user';
	protected static $tableAlias = 'user';
	protected static $primaryKey = 'id';
	protected static $primaryKeyIsAutoIncrement = true;
	
	/**
	 * An array of every field in the table.
	 */
	protected static $fields = array ('id', 'username', 'password', 'email', 'realname', 'user_permission_id' );
	


}
?>