<?php
namespace LC\Recaptcha\Error;

/**
 * Class Factory
 * @package LC\Recaptcha\Error
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Factory
{
    /**
     * @return Codes\BadRequestError
     */
    public function badRequest()
    {
        return new Codes\BadRequestError();
    }

    /**
     * @return Codes\InvalidInputResponseError
     */
    public function invalidInputResponse()
    {
        return new Codes\InvalidInputResponseError();
    }

    /**
     * @return Codes\InvalidInputSecretError
     */
    public function invalidInputSecret()
    {
        return new Codes\InvalidInputSecretError();
    }

    /**
     * @return Codes\MissingInputResponseError
     */
    public function missingInputResponse()
    {
        return new Codes\MissingInputResponseError();
    }

    /**
     * @return Codes\MissingInputSecretError
     */
    public function missingInputSecret()
    {
        return new Codes\MissingInputSecretError();
    }
}