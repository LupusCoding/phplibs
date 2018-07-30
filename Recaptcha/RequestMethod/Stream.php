<?php
namespace LC\Recaptcha\RequestMethod;

use LC\Recaptcha\Request;

/**
 * Class Stream
 * @package LC\Recaptcha\RequestMethod
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Stream implements RequestMethodInterface
{
    /** @var string */
    private $verify_url;

    /**
     * Socket constructor.
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
        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'CN_name' => 'www.google.com',
                'content' => $request->toQueryString(),
            ),
        );
        $context = stream_context_create($options);
        return file_get_contents($this->verify_url, false, $context);
    }
}