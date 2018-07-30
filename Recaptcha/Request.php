<?php
namespace LC\Recaptcha;

/**
 * Class Request
 * @package LC\Recaptcha
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Request
{
    /** @var string */
    private $secret;

    /** @var string */
    private $response;

    /** @var string */
    private $remoteip;

    /** @var string */
    private $action;

    /**
     * Request constructor.
     * @param string $secret
     * @param string $response
     * @param null|string $remoteip
     * @param null|string $action
     */
    public function __construct($secret, $response, $remoteip = '', $action = '')
    {
        $this->secret = $secret;
        $this->response = $response;
        $this->remoteip = $remoteip;
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getSecret(): string
    {
        return $this->secret;
    }

    /**
     * @return string
     */
    public function getResponse(): string
    {
        return $this->response;
    }

    /**
     * @return string
     */
    public function getRemoteIp(): string
    {
        return $this->remoteip;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'secret' => $this->getSecret(),
            'response' => $this->getResponse(),
            'remoteip' => $this->getRemoteIp(),
            'action' => $this->getAction(),
        ];
    }

    /**
     * @return string
     */
    public function toQueryString()
    {
        return http_build_query($this->toArray(), '', '&');
    }
}