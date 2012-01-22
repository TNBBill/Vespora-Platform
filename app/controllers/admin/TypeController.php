<?php
namespace vespora\controllers\admin;

use vespora\controllers\admin\BaseController;
use hydrogen\view\View;
use hydrogen\config\Config;
use vespora\helpers\viewHelper;
use vespora\models\TypeModel;

class TypeController extends BaseController
{

    public function index()
    {
        $typeModel = TypeModel::getInstance();
        $typeBeans = $typeModel->getTypeList();
        $types = array();

        foreach($typeBeans as $typeBean){
            $types[] = $typeBean->toArray();
        }

        View::setVar('types', $types);
        viewHelper::$layout = "type/index";
    }

}

?>