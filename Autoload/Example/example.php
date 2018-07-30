<?php

// use path to LC\Autoload\LCAutoloader File
require_once ('../LCAutoloader.php');

// init autoloader
$Autoloader = new \LC\Autoload\LCAutoloader();
// register autoloader to system
$Autoloader->register();
// add namespace
$Autoloader->addNamespace('My\Namespace', realpath(dirname(__FILE__)));
