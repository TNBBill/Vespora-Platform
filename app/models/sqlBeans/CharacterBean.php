<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;

/**
 * User: bill
 * Date: 1/19/12
 * Time: 5:14 PM
 */
class CharacterBean extends SQLBean
{
    protected static $tableNoPrefix = 'character';
    protected static $tableAlias = 'character';
    protected static $primaryKey = 'id';
    protected static $primaryKeyIsAutoIncrement = true;

    /**
     * An array of every field in the table.
     */
    protected static $fields = array('id', 'name');

}

?>