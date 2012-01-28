<?php
//Tell hydrogen where to find it's autoconfig
define('HYDROGEN_AUTOCONFIG_PATH', __DIR__ . '/../lib/hydrogen.autoconfig.php');


//Library Inclusions
require_once(__DIR__ . "/../lib/Hydrogen/hydrogen.inc.php");
require_once ('PHPUnit/Autoload.php');

use hydrogen\autoloader\Autoloader;

//Step 1: Configure the Hydrogen autoloader to use TNB namespace
Autoloader::registerNamespace("vespora", __DIR__ . '/../app');

header('Content-type: text/plain');
# error reporting
ini_set('display_errors',1);
error_reporting(E_ALL|E_STRICT);

# run the test
$suite = new PHPUnit_Framework_TestSuite('vespora\test\CampaignTest');
PHPUnit_TextUI_TestRunner::run($suite);
?>