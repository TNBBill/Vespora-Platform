<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;

class UserPermissionBean extends SQLBean {
	protected static $tableNoPrefix = 'user_permission';
	protected static $tableAlias = 'userPermission';
	protected static $primaryKey = 'id';
	protected static $primaryKeyIsAutoIncrement = true;
	
	/**
	 * An array of every field in the table.
	 */
	protected static $fields = array ('id', 'rolename', 'superadmin', 'admin' );

}
?>