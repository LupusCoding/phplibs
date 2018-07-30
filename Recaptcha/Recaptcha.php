<?php
namespace LC\Recaptcha;

/**
 * Class Recaptcha
 * @package LC\Recaptcha
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Recaptcha
{
    /** @var string  */
    protected $validate_url = 'https://www.google.com/recaptcha/api/siteverify';

    /** @var string (secret key) */
    protected $secret;

    /** @var RequestMethod\Stream|RequestMethod\Socket|RequestMethod\Curl  */
    protected $request_method;

    /**
     * Recaptcha constructor.
     * @param $secret
     * @param string $method
     */
    public function __construct($secret, $method = null)
    {
        if(!isset($secret)) {
            throw new \InvalidArgumentException('No secret was given.');
        }

        $this->secret = $secret;

        switch ($method) {
            case 'curl':
                $this->request_method = new RequestMethod\Curl($this->validate_url);
                break;
            case 'socket':
                $this->request_method = new RequestMethod\Socket($this->validate_url);
                break;
            case 'stream':
                $this->request_method = new RequestMethod\Stream($this->validate_url);
                break;
            default:
                $this->request_method = new RequestMethod\Stream($this->validate_url);
                break;
        }
    }

    /**
     * @param string $token (g-recaptcha-response)
     * @param string $remote_ip
     * @return Response
     */
    public function verify($token, $remote_ip = null)
    {
        if(!isset($token)) {
            return new Response(null, false, null, null, ['missing-input-response']);
        }

        $request = new Request($this->secret, $token, $remote_ip);
        $response = $this->request_method->submit($request);
        return new Response($response);
    }
}