# Recaptcha

## Installation
1. Get Registry package from github.
   * (optional | recommended) Get Autoloader package from github.
2. Place libs inside your project i.e.: ./my/libs/
3. Get any PSR-4 Autoloader and add namespace "LC\Registry" 
with path to Registry package. i.e.: ./my/libs/LC/Registry

## Usage
For usage examples see the example files.

## Changelog
* v0.1.0<br/>
  Stack types:
  * Standard
    Key-value store with checks for already used keys und the 
    possibility to set values to "protected" which makes this 
    values un-removable. 
  * Mini<br/>
    simple key-value store.
  * Scoped
    Key-value store like "Standard", but with possibility to 
    assign values to scopes. I.e. for making values only 
    accessable to specific routines. 