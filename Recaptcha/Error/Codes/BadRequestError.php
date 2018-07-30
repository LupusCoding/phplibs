<?php
namespace LC\Recaptcha\Error\Codes;

use LC\Recaptcha\Error\AbstractError;

/**
 * Class BadRequestError
 * @package LC\Recaptcha\Error\Codes
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class BadRequestError extends AbstractError
{
    /** @var string  */
    private $error = 'bad-request';

    /** @var string  */
    private $description = 'The request is invalid or malformed.';
}