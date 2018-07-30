<?php

// use path to LC\Autoload\LCCodepoolLoader File
require_once ('../LCCodepoolLoader.php');

// init autoloader
$Autoloader = new \LC\Autoload\LCCodepoolLoader();
// register autoloader to system
$Autoloader->register();
// add codepools
// info: it is a good idea to add codepools only from one specific file inside your core code, where
//       you also initialize the autoloader.
// info: classes will be searched in the order of the codepools. Only the first found file is loaded!
$Autoloader->addCodepool(realpath(dirname(__FILE__)) . '/code/custom' );    // local customizations
$Autoloader->addCodepool(realpath(dirname(__FILE__)) . '/code/community' ); // downloadable packages (i.e. plugins)
$Autoloader->addCodepool(realpath(dirname(__FILE__)) . '/code/core' );      // core files
// info: the search order in this example would be:
//       1. custom
//       2. community
//       3. core
// info: You may put new code in every codepool you want.
// info: To override a core file in this example, like "/myapp/code/core/MyModule/MyObject.php", just add a file with
//       the same name inside another codepool folder, i.e. "/myapp/code/custom/MyModule/MyObject.php".


// add namespace
// info: now, in your modules you may simply add the namespaces like this.
$Autoloader->addNamespace('My\Namespace', realpath(dirname(__FILE__)));
