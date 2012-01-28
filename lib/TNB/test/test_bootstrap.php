<?php
//Tell hydrogen where to find it's autoconfig
define('HYDROGEN_AUTOCONFIG_PATH', '/projects/Vespora-Platform/lib/TNB/test/hydrogen.autoconfig.php');


//Library Inclusions
require_once("/projects/Vespora-Platform/lib/Hydrogen/hydrogen.inc.php");
require_once('/projects/Vespora-Platform/lib/googleplus/google-api-php-client/src/apiClient.php');
require_once('/projects/Vespora-Platform/lib/googleplus/google-api-php-client/src/contrib/apiOauth2Service.php');
require_once('/projects/Vespora-Platform/lib/lightopenid/openid.php');

//Namespace Inclusions
use hydrogen\config\Config;
use hydrogen\log\Log;
use hydrogen\view\View;
use hydrogen\autoloader\Autoloader;
use hydrogen\controller\Router;

use vespora\helpers\stringHelper;
use vespora\helpers\viewHelper;
use vespora\helpers\sessionHelper;

//Step 1: Configure the Hydrogen autoloader to use TNB namespace
Autoloader::registerNamespace("vespora",'/projects/Vespora-Platform/app');
sessionHelper::start();
?>