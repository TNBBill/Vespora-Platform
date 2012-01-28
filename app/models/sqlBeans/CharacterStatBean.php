<?php
namespace vespora\models\sqlBeans;

use hydrogen\database\Query;
use hydrogen\sqlbeans\SQLBean;
use vespora\models\TypeModel;
use vespora\models\CharacterModel;


/**
 * User: bill
 * Date: 1/25/12
 * Time: 8:02 AM
 */
class CharacterStatBean extends SQLBean
{
    protected static $tableNoPrefix = 'character_stat';
    protected static $tableAlias = 'character_stat';
	protected static $primaryKey = array('character_id','stat_id');
	protected static $primaryKeyIsAutoIncrement = false;
	
	/**
     * An array of every field in the table.
     */
	protected static $fields = array('character_id', 'stat_id', 'currentValue');

    public function toArray($full = true){
        if(!$full)
            return $this->stored;
        $typeModel = TypeModel::getInstance();

        $charModel = CharacterModel::getInstance();

        $charBean = $charModel->getCharacter($this->character_id);

        $retVal =  $this->stored;
        $stat = $typeModel->getStatList($charBean->type_id, $this->stat_id);

        $retVal['name'] = $stat[0]->stat;

        return $retVal;
    }

    public function update(){
        $query = new Query('UPDATE');
        $query->table(self::$tableNoPrefix);
        $query->set('currentValue = ?', $this->currentValue);
        $query->where('character_id = ?', $this->character_id);
        $query->where('stat_id = ?', $this->stat_id);
        $stmt = $query->prepare();
        $stmt->execute();
    }
}

?>