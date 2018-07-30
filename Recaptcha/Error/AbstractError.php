<?php
namespace LC\Recaptcha\Error;

/**
 * Class AbstractError
 * @package LC\Recaptcha\Error
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
abstract class AbstractError implements ErrorInterface
{
    /** @var string */
    private $error;

    /** @var string */
    private $description;

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}