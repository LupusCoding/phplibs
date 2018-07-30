<?php
namespace LC\Registry\Exception;
use Throwable;

/**
 * Class RegistryKeyAlreadyExistException
 * @package LC\Registry\Exception
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class RegistryKeyInvalidFormatException extends \Exception
{
    const MSG = 'Invalid key given (%s). Allowed characters are (%s).';
    const ALLOWED_CHARS = 'A-Za-z0-9#_-';

    public function __construct(string $key)
    {
        parent::__construct(sprintf(self::MSG, $key, self::ALLOWED_CHARS), null, null);
    }
}