<?php
namespace vespora\models;
use hydrogen\model\Model;
use hydrogen\database\Query;
use hydrogen\database\DatabaseEngine;
use hydrogen\database\DatabaseEngineFactory;
use vespora\models\sqlBeans\CharacterBean;
use vespora\models\sqlBeans\CharacterStatBean;
use vespora\models\sqlBeans\CharacterSkillBean;


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

    public function getCampaignCharacterList($campaign){
        $query = new Query ( "SELECT" );

        $query->where ( "campaign_id = ?", $campaign );
        $character = CharacterBean::select ( $query );
        if (! $character) {
            return false;
        }
        return $character;
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

    public function getStats($id, $stat= false){

        $query = new Query ( "SELECT" );
        $query->where ( "character_id = ?", $id );
        if($stat)
            $query->where ( "stat_id = ?", $stat );

        $query->join('type_availableStats', 'availableStats', 'LEFT');
        $query->on('vespora_character_stat.stat_id = availableStats.id');
        $query->orderby('availableStats.stat');

        $type = CharacterStatBean::select ( $query );
        if (! $type) {
            return false;
        }
        if($stat)
            return $type[0];
        return $type;

    }

    public function getSkills($id, $skill= false){

        $query = new Query ( "SELECT" );
        $query->where ( "character_id = ?", $id );

        if($skill)
            $query->where ( "skill_id = ?", $skill );
        $query->join('type_availableSkills', 'availableSkills', 'LEFT');
        $query->on('vespora_character_skill.skill_id = availableSkills.id');
        $query->orderby('availableSkills.skill');

        $type = CharacterSkillBean::select ( $query );
        if (! $type) {
            return false;
        }
        if($skill)
            return $type[0];
        return $type;

    }
}
?>