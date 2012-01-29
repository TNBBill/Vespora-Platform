<?php
namespace vespora\models;
use hydrogen\model\Model;
use hydrogen\database\Query;
use vespora\models\sqlBeans\TypeBean;
use vespora\models\sqlBeans\TypeAvailableStatsBean;
use vespora\models\sqlBeans\TypeAvailableSkillsBean;
use vespora\models\sqlBeans\TypeSkillRanksBean;
use vespora\models\sqlBeans\TypeStatRanksBean;

class TypeModel extends Model
{
    protected static $modelID = "type";

    /**
     * @param $id ID of the Type
     * @return bool Returns false, or the type with the passed ID
     */
    public function getType__600($id){
        $query = new Query ( "SELECT" );
        $query->where ( "id = ?", $id );
        $type = TypeBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type[0];
    }

    /**
     * Gets all the types currently stored.
     * @return array|bool
     */
    public function getTypeList__600(){
        $query = new Query ( "SELECT" );

        $type = TypeBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type;
    }

    /**
     * Gets the available Stats for the selected type.
     * @param $id
     * @return array|bool
     */
    public function getStatList__600($id, $stat = false){
        $query = new Query ( "SELECT" );
        $query->where ( "type_id = ?", $id );

        if($stat)
            $query->where ( "id = ?", $stat);

        $type = TypeAvailableStatsBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type;
    }

    /**
     * Gets the available skills for the selected type.
     * @param $id
     * @return array|bool
     */
    public function getSkillList__600($id, $skill = false){
        $query = new Query ( "SELECT" );
        $query->where ( "type_id = ?", $id );
        if($skill)
            $query->where ( "id = ?", $skill);

        $type = TypeAvailableSkillsBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type;
    }



    public function getSkillRanks__600($id){
        $query = new Query ( "SELECT" );
        $query->where ( "type_id = ?", $id );

        $type = TypeSkillRanksBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type;
    }

    public function getStatRanks__600($id){
        $query = new Query ( "SELECT" );
        $query->where ( "type_id = ?", $id );

        $type = TypeStatRanksBean::select ( $query );
        if (! $type) {
            return false;
        }
        return $type;
    }
}
?>