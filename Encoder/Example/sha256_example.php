<?php
// Usage example with sha256 encoding

// use path to \LC\Encoder\EncoderFactory
require_once '../EncoderFactory.php';

$factory = new \LC\Encoder\EncoderFactory();
$encoder = $factory->sha256();

$message = 'my sha256example message';
$encoded = $encoder->encode($message);

echo 'original: ' . $message . "\r\n";
echo 'encoded:  ' . $encoded . "\r\n";
