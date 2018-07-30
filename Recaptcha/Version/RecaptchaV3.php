<?php
namespace LC\Recaptcha\Version;

use LC\Recaptcha\Recaptcha;
use LC\Recaptcha\Request;
use LC\Recaptcha\Response;

/**
 * Class RecaptchaV3
 * @package LC\Recaptcha\Version
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class RecaptchaV3 extends Recaptcha
{
    const VERSION = 3;

    /**
     * @param string $token (g-recaptcha-response)
     * @param string $remote_ip
     * @return Response
     */
    public function verify($token, $remote_ip = null, $action = '')
    {
        if(!isset($token)) {
            return new Response(null, false, null, null, ['missing-input-response']);
        }

        $request = new Request($this->secret, $token, $remote_ip, $action);
        $response = $this->request_method->submit($request);
        return new Response($response);
    }
}