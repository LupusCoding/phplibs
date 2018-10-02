<?php
// Autoload script
//require_once realpath('../../Autoload/LCAutoloader.php');
require_once realpath(dirname(__FILE__).'/../../Autoload/LCAutoloader.php');
$Autoloader = new \LC\Autoload\LCAutoloader();
$Autoloader->register();
$Autoloader->addNamespace('LC\EventPro', realpath(dirname(__FILE__).'/..'));
