<?php

// Usage example for static use

// only for this example we use a mock listener
// see listener_example.php for lister examples
require '../Tests/MockListener.php';
$listener = new \LC\EventPro\Tests\MockListener();


// use path to \LC\EventPro\Factory
require_once '../Factory.php';

// get the factory and load the processor [recommended way]
$f = new \LC\EventPro\Factory();
$f->processor();
// OPTIONAL: use getInstance function to load the processor
\LC\EventPro\Component\EventProcessor::getInstance();

// add listener
\LC\EventPro\Component\EventProcessor::append($listener);
// get listener
\LC\EventPro\Component\EventProcessor::listener('Any.Lister.Name.You.Know');
// set listener to liston on event
\LC\EventPro\Component\EventProcessor::listener('Any.Lister.Name.You.Know')->listen('my-event-name');
// dispatch event
\LC\EventPro\Component\EventProcessor::dispatch('my-event-name', ['any data like', 'string', 1, TRUE]);
