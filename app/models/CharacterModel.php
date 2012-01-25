<?php
namespace vespora\models;
use hydrogen\model\Model;
use hydrogen\database\Query;
use hydrogen\database\DatabaseEngine;
use hydrogen\database\DatabaseEngineFactory;
use vespora\models\sqlBeans\CharacterBean;
use vespora\models\sqlBeans\CharacterStatBean;


class CharacterModel extends Model
{
    protected static $modelID = "character";

    public function getCharacter($id){
        $query = new Query ( "SELECT" );
        $query->where ( "id = ?", $id );
        $character = CharacterBean::select ( $query );
        if (! $character) {
            return false;
        }
        return $character[0];
    }

    public function getCharacterList($user = false){
        $query = new Query ( "SELECT" );
        if($user)
            $query->where ( "user_id = ?", $user );
        $character = CharacterBean::select ( $query );
        if (! $character) {
            return false;
        }
        return $character;
    }

    public function getLastId(){
        $db = DatabaseEngineFactory::getEngine();
        $stmt = $db->prepare("SELECT MAX(id) as id FROM `vespora_" . self::$modelID . "`");
        $stmt->execute();
        $result = $stmt->fetchObject();
        return $result->id;
    }

    public function getStats($id){

        $query = new Query ( "SELECT" );
        $query->where ( "character_id = ?", $id );

        $type = CharacterStatBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type;

    }
}
?>