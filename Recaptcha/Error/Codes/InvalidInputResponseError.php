<?php
namespace LC\Recaptcha\Error\Codes;

use LC\Recaptcha\Error\AbstractError;

/**
 * Class InvalidInputResponseError
 * @package LC\Recaptcha\Error\Codes
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class InvalidInputResponseError extends AbstractError
{
    /** @var string  */
    private $error = 'invalid-input-response';

    /** @var string  */
    private $description = 'The response parameter is invalid or malformed.';
}