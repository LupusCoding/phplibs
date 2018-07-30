<?php
namespace LC\Recaptcha\RequestMethod;

use LC\Recaptcha\Request;

/**
 * Interface RequestMethodInterface
 * @package LC\Recaptcha\RequestMethod
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
interface RequestMethodInterface
{
    /**
     * RequestMethodInterface constructor.
     * @param string $verify_url
     * @return void
     */
    public function __construct($verify_url);

    /**
     * @param Request $request
     * @return string|bool
     */
    public function submit(Request $request);
}