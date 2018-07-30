<?php
namespace LC\Recaptcha;

use LC\Recaptcha\Version\RecaptchaV2;
use LC\Recaptcha\Version\RecaptchaV3;

/**
 * Class Factory
 * @package LC\Recaptcha
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Factory
{
    /**
     * Factory constructor.
     */
    public function __construct()
    {
        $Autoloader = new \LC\Autoload\LCAutoloader();
        $Autoloader->register();
        $Autoloader->addNamespace('LC\Recaptcha', realpath(dirname(__FILE__)));
    }

    /**
     * @param string $secret
     * @param string|null $method
     * @param int|null $version
     * @return Recaptcha|RecaptchaV2|RecaptchaV3
     */
    public function recaptcha($secret, $method = null, $version = null)
    {
        switch($version) {
            case 2:
                return $this->recaptchaV2($secret, $method);
                break;
            case 3:
                return $this->recaptchaV3($secret, $method);
                break;
            default:
                return new Recaptcha($secret, $method);
                break;
        }
    }

    /**
     * @param string $secret
     * @param string|null $method
     * @return RecaptchaV2
     */
    public function recaptchaV2($secret, $method = null): RecaptchaV2
    {
        return new RecaptchaV2($secret, $method);
    }

    /**
     * @param string $secret
     * @param string|null $method
     * @return RecaptchaV3
     */
    public function recaptchaV3($secret, $method = null): RecaptchaV3
    {
        return new RecaptchaV3($secret, $method);
    }
}