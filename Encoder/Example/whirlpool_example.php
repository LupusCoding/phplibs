<?php
// Usage example with whirlpool encoding

// use path to \LC\Encoder\EncoderFactory
require_once '../EncoderFactory.php';

$factory = new \LC\Encoder\EncoderFactory();
$encoder = $factory->whirlpool();

$message = 'my whirlpool message';
$encoded = $encoder->encode($message);

echo 'original: ' . $message . "\r\n";
echo 'encoded:  ' . $encoded . "\r\n";
