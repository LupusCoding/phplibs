<?php
namespace LC\Recaptcha\Error\Codes;

use LC\Recaptcha\Error\AbstractError;

/**
 * Class InvalidInputSecretError
 * @package LC\Recaptcha\Error\Codes
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class InvalidInputSecretError extends AbstractError
{
    /** @var string  */
    private $error = 'invalid-input-secret';

    /** @var string  */
    private $description = 'The secret parameter is invalid or malformed.';
}