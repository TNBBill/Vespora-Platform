<?php
namespace vespora\models;
use hydrogen\model\Model;
use hydrogen\database\Query;
use vespora\models\sqlBeans\SessionBean;

class SessionModel extends Model {
	protected static $modelID = "session";
	
	public function getSession($uid) {
		$query = new Query ( "SELECT" );
		$query->where ( "uid = ?", $uid );
		$session = SessionBean::select ( $query );
		if (! $session) {
			return false;
		}
		return $session [0];
	}
	
	public function insertSession($userID, $uid) {
		$query = new Query ( "INSERT" );
		$query->intoTable ( 'session' );
		$query->intoField ( 'uid' );
		$query->intoField ( 'user_id' );
        $query->intoField ('user_rest_key');
		$query->values ( "(?, ?, ?)", array ($uid, $userID , uniqid('vespora_')));
		$stmt = $query->prepare ();
		$stmt->execute ();
	}
	
	public function deleteSession($uid) {
		$query = new Query ( "DELETE" );
		$query->from ( "session" );
		$query->where ( "uid = ?", $uid );
		$query->limit ( 1 );
		$stmt = $query->prepare ();
		$stmt->execute ();
	}

}
?>