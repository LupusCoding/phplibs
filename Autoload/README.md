# Autoloader

## Installation
1. Get Autoloader package from github.
2. Place the Autoloader lib inside your project i.e.: ./my/libs/

Now you are ready to use the encoder. See "Usage" or the example file for further informations.

## Usage
```php
// use path to LC\Autoload\LCAutoloader File
require_once ('path/to/Autoload/LCAutoloader.php');
// init autoloader
$Autoloader = new \LC\Autoload\LCAutoloader();
// register autoloader to system
$Autoloader->register();
// add namespace
$Autoloader->addNamespace('My\Namespace', '/filepath/to/my/namespace');
```
Afterwards just call your classes like:
```php
$class = new \My\Namespace\Classname();
```

## Changelog
* v0.2.0<br/>
   Added autoloader with codepool support
* v0.1.0<br/>
   Created default Autoloader 