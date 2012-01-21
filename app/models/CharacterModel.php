<?php
namespace vespora\models;
use hydrogen\model\Model;
use hydrogen\database\Query;
use vespora\models\sqlBeans\CharacterBean;

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
}   
?>