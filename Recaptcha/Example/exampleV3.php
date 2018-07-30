<?php
// Verify a reCaptcha v3 request
// get further informations about verifying at https://developers.google.com/recaptcha/docs/verify

// use path to LC\Recaptcha\Factory File
require_once ('../Factory.php');

// default json response if no token is given
$json = ['status' => 'failed', 'error-codes' => ['invalid-token'], 'errors' => ['Invalid G-reCapthca Token given.']];
// get token
$token = (isset($_POST['g-recaptcha-token']) ? $_POST['g-recaptcha-token'] : '');
// get action
$action = (isset($_POST['action']) ? $_POST['action'] : '');
// to prevent exceptions, always check if token is given
if($token !== '') {
    $factory = new \LC\Recaptcha\Factory();
    // get recaptcha object
    $recaptcha = $factory->recaptchaV3('my-secret-key');
    // verify data
    $response = $recaptcha->verify($token, $_SERVER['REMOTE_ADDR'], $action);
    // check response status
    if($response->isSuccess()) {
        // maybe we want to do anything here?
    } else {
        // maybe we want to do anything here?
    }
    $json = $response->toJSON();
}

// send json response
echo json_encode($json);
return;