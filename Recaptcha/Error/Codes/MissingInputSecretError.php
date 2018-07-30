<?php
namespace LC\Recaptcha\Error\Codes;

use LC\Recaptcha\Error\AbstractError;

/**
 * Class MissingInputSecretError
 * @package LC\Recaptcha\Error\Codes
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class MissingInputSecretError extends AbstractError
{
    /** @var string  */
    private $error = 'missing-input-secret';

    /** @var string  */
    private $description = 'The secret parameter is missing.';
}