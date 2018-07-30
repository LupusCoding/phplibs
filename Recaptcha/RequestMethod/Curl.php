<?php
namespace LC\Recaptcha\RequestMethod;

use LC\Recaptcha\Request;

/**
 * Class Curl
 * @package LCreCaptcha\API\RequestMethod
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Curl implements RequestMethodInterface
{
    /** @var string */
    private $verify_url;

    /**
     * Curl constructor.
     * @inheritdoc
     */
    public function __construct($verify_url)
    {
        $this->verify_url = $verify_url;
    }

    /**
     * @inheritdoc
     */
    public function submit(Request $request)
    {
        $ch = curl_init($this->verify_url);

        $options = array(
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            CURLOPT_POSTFIELDS => $request->toQueryString(),
            CURLINFO_HEADER_OUT => false,
            CURLOPT_HEADER => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => true
        );
        curl_setopt_array($ch, $options);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}