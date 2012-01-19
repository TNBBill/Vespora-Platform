<?php
//Tell hydrogen where to find it's autoconfig
define('HYDROGEN_AUTOCONFIG_PATH', __DIR__ . '/../lib/hydrogen.autoconfig.php');


//Library Inclusions
require_once(__DIR__ . "/../lib/Hydrogen/hydrogen.inc.php");

//Namespace Inclusions
use hydrogen\config\Config;
use hydrogen\log\Log;
use hydrogen\view\View;
use hydrogen\autoloader\Autoloader;
use hydrogen\controller\Router;

use vespora\helpers\stringHelper;

//Step 1: Configure the Hydrogen autoloader to use TNB namespace
Autoloader::registerNamespace("vespora", __DIR__ . '/../app');


//Step 2: Grab the URL
$url = '/';
if(isset($_GET['url']))
    $url= $_GET['url'];
Log::info("url requested: $url");



//Step 3: Setting up view variables that are added to by controllers.
$layout = 'home/index';
$theme = 'main';



//Step 4: Setup the router!
$router = new Router();

$router->post('/admin(/:controller(/:function(/:*args)))',
    array('controller' => 'home','function' => 'index'),
    array('controller' => '\vespora\controllers\admin\%{controller|capfirst}Controller',
        'function' => '%{function|lower}_post'));

$router->request('/admin(/:controller(/:function(/:*args)))',
    array('controller' => 'home','function' => 'index' ),
    array('controller' => '\vespora\controllers\admin\%{controller|capfirst}Controller'));


$router->post('/(:controller(/:function(/:*args)))',
    array('controller' => 'home','function' => 'index'),
    array('controller' => '\vespora\controllers\main\%{controller|capfirst}Controller',
        'function' => '%{function|lower}_post'));

$router->request('/(:controller(/:function(/:*args)))',
    array('controller' => 'home','function' => 'index' ),
    array('controller' => '\vespora\controllers\main\%{controller|capfirst}Controller'));

$router->catchAll(array('controller'=> 'Error', 'function'=> 'error404' ),
    array('controller' => '\vespora\controllers\main\%{controller|capfirst}Controller'));

//Prepare and dispatch
$router->start($url);
Log::info("url sent to router: $url");


//Load the CS and JS arrays based on enviornment
if (Config::getVal('Vespora','mode') > 0){
    // QA / PROD - should be using cat/mined files. 
    View::setVar('css', array(Config::getVal('Vespora','CDN_Server') . 'css/style.css'));
    View::setVar('js', array(Config::getVal('Vespora','CDN_Server') . 'js/script.js'));
}
else{
    // DEV - searching though the folder for use. 
    $dirIterator = new DirectoryIterator(__DIR__ . '/css');
    $cssFiles = array();
    $jsFiles = array();
    while($dirIterator->valid()){

        $filename = $dirIterator->getFilename();
        if(stringHelper::endswith($filename, '.css'))
            $cssFiles[] = '/css/' . $filename;
        $dirIterator->next();
    }
    View::setVar('css', $cssFiles);

    $dirIterator = new DirectoryIterator(__DIR__ . '/js');
    while($dirIterator->valid()){

        $filename = $dirIterator->getFilename();
        if(stringHelper::endswith($filename, '.js'))
            $jsFiles[] = '/js/' . $filename;
        $dirIterator->next();
    }
    View::setVar('js', $jsFiles);
}



//run the view engine!
Log::info("View engine loaded: $layout");
View::load($theme . '/' . $layout);
?>
