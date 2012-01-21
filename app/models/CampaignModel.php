<?php
namespace vespora\models;
use hydrogen\model\Model;
use hydrogen\database\Query;
use vespora\models\sqlBeans\CampaignBean;

class CampaignModel extends Model
{
    protected static $modelID = "campaign";

    public function getCampaign($id){
        $query = new Query ( "SELECT" );
        $query->where ( "id = ?", $id );
        $campaign = CampaignBean::select ( $query );
        if (! $campaign) {
            return false;
        }
        return $campaign[0];
    }

    public function getCampaignList(){
        $query = new Query ( "SELECT" );

        $campaign = CampaignBean::select ( $query );
        if (! $campaign) {
            return false;
        }
        return $campaign;
    }
}   
?>