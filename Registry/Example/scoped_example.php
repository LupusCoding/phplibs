<?php
// Usage example with standard stack

global $Registry;
// use path to \LC\Registry\Factory
require_once '../Factory.php';

$f = new \LC\Registry\Factory();
$Registry = $f->scoped();

// register value to global scope
$Registry::register('value_one', 'value 1');
// register value to "example" scope
$Registry::register('value_two', 'value 2', 'example');
// register protected (not removable) value to global scope
$Registry::register('value_protected', 'protected', 'global', true);
// register protected (not removable) value to "example" scope
$Registry::register('value_protected', 'protected', 'example', true);

// get value from global scope
$value_one = $Registry::get('value_one');
// get value from "example" scope
$value_two = $Registry::get('value_two', 'example');

// remove value from global scope
$Registry::unregister('value_one');
// remove value from "example" scope
$Registry::unregister('value_two', 'example');

// get existing scope names
$scopes = $Registry::getExistingScopes();