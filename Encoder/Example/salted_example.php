<?php
// Usage example with sha256 encoding and salted message

// use path to \LC\Encoder\EncoderFactory
require_once '../EncoderFactory.php';

$factory = new \LC\Encoder\EncoderFactory();
$encoder = $factory->sha256();

$message = 'my sha256example message';
// for passwords use random salt
// for validatable hash as rest / soap parameter you should use date without time
$salt = date('Y-m-d');
// for passwords you should not use a token
// for validatable hash as rest / soap parameter you may use a token as public key
$token = 'my-public-token';
// you may use a special character as extra salt but an empty string may be the better choice
$special_character = '#';

$encoded = $encoder->encode(implode(
    $special_character,
    [$message, $salt, $token] // sequence for message encoding
));
// always remember that the sequence must be in the same order,
// in every place you want to validate the encoded string

echo 'original:             "' . $message . '"' . "\r\n";
echo 'salt:                 "' . $salt . '"' . "\r\n";
echo 'token:                "' . $token . '"' . "\r\n";
echo 'special char:         "' . $special_character . '"' . "\r\n";
echo 'encode-ready message: "' . implode($special_character, [$message, $salt, $token]) . '"' . "\r\n";
echo 'encoded:              "' . $encoded . '"' . "\r\n";
