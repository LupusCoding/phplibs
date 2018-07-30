<?php
// Usage example with standard stack

global $Registry;
// use path to \LC\Registry\Factory
require_once '../Factory.php';

$f = new \LC\Registry\Factory();
$Registry = $f->standard();

// register string value
$Registry::register('value_str', 'value 1');
// register integer value
$Registry::register('value_int', 123);
// register array as value
$Registry::register('value_arr', [ 'abc', 123 ]);
// register protected (not removable) value
$Registry::register('value_protected', 'protected', true);

// get value for key "value_str"
$value_str = $Registry::get('value_str');

// remove key-value pair for key "value_str"
$Registry::unregister('value_str');

// get actual stack size
$stack_size = $Registry::getStackSize();