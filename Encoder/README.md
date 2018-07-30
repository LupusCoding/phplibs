# Encoder Lib

## Installation
1. Get Encoder package from github.
   * (optional | recommended) Get Autoloader package from github.
2. Place libs inside your project i.e.: ./my/libs/
3. Get any PSR-4 Autoloader and add namespace "LC\Encoder" 
with path to Encoder package. i.e.: ./my/libs/LC/Encoder

Now you are ready to use the encoder. See "Usage" or the example files for further informations.

## Usage
```php
/* get factory */
$factory = new \LC\Encoder\EncoderFactory();
/* choose encode from factory */
$encoder = $factory->sha256();
/* prepare message */
$message = 'my sha256example message';
/* get encoded string */
$encoded = $encoder->encode($message);
```

## Changelog
* v0.2.0<br/>
  New Encoders:
   * Haval 160,4
   * Haval 192,4
   * Ripemd 128
   * Tiger 162,4
   * Whirlpool
* v0.1.0<br/>
  New Encoders:
   * MD5
   * Sha 256
   * Sha 512