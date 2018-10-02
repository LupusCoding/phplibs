<?php

// Usage example for non-static use

// only for this example we use a mock listener
// see listener_example.php for lister examples
require '../Tests/MockListener.php';
$listener = new \LC\EventPro\Tests\MockListener();


// you may set the event processor as global variable
global $EventPro;

// use path to \LC\EventPro\Factory
require_once '../Factory.php';

// get the factory and load the processor
$f = new \LC\EventPro\Factory();
$EventPro = $f->processor(false);

// add listener
$EventPro->addListener($listener);
// get listener
$EventPro->getListener('Any.Lister.Name.You.Know');
// set listener to liston on event
$EventPro->getListener('Any.Lister.Name.You.Know')->listen('my-event-name');
// dispatch event
$EventPro->dispatchEvent('my-event-name', ['any data like', 'string', 1, TRUE]);
