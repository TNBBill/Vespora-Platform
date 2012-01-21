<?php
namespace vespora\models\sqlBeans;

use hydrogen\sqlbeans\SQLBean;

class CampaignBean extends SQLBean {
    protected static $tableNoPrefix = 'campaign';
    protected static $tableAlias = 'campaign';
    protected static $primaryKey = 'id';
    protected static $primaryKeyIsAutoIncrement = true;

    /**
     * An array of every field in the table.
     */
    protected static $fields = array ('id', 'name', 'type_id' );

}
?>