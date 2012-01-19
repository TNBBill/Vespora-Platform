<?php
namespace vespora\models;
use hydrogen\model\Model;
use hydrogen\config\Config;
use hydrogen\database\Query;
use hydrogen\log\Log;
use vespora\models\sqlBeans\UserBean;
use vespora\models\sqlBeans\UserPermissionBean;
use hydrogen\database\DatabaseEngineFactory;

class UserModel extends Model {
	protected static $modelID = "user";
	
	public function getUser($id = -1) {
		if($id == -1)
			return new UserBean;
		$query = new Query ( "SELECT" );
		$query->where ( "id = ?", $id );
		$user = UserBean::select ( $query );
		if (! $user) {
			return false;
		}
		return $user [0];
	}
	
	public function getUserByName($username) {
		$query = new Query ( "SELECT" );
		$query->where ( "username = ?", $username );
		$user = UserBean::select ( $query );
		if (! $user) {
			return false;
		}
		return $user [0];
	}
	
	public function authenticate($username, $password) {
		$query = new Query ( "SELECT" );
		$query->from ( self::$modelID );
		$query->field ( '`username`' );
		$query->field ( '`password`' );
		$query->where ( "username = ?", $username );
		$query->where ( "password = AES_ENCRYPT(?,'" . Config::getVal ( "security", "AESPrivateKey" ) . "')", $password );
		$stmt = $query->prepare ();
		$stmt->execute ();
		if ($stmt->rowCount () <= 0) {
			Log::notice ( "Authenticate Failure: Username = $username | Password =
$password" );
			return false;
		
		}
		Log::info ( "Authenticate Pass: Username = $username | Password =$password" );
		return true;
	
	}
	
	public function getPermissions($userID) {
		$query = new Query ( "SELECT" );
		$query->where ( "id = ?", $userID );
		$user = UserBean::select ( $query );
		
		$query = new Query ( "SELECT" );
		$query->where ( "id = ?", $user [0]->user_permission_id );
		$permission = UserPermissionBean::select ( $query );
		if (! $permission) {
			return false;
		}
		return $permission [0];
	}


}
?>