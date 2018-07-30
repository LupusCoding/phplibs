<?php
namespace LC\Recaptcha\Error;

/**
 * Interface ErrorInterface
 * @package LC\Recaptcha\Error
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
interface ErrorInterface
{
    /**
     * @return string
     */
    public function getError(): string;

    /**
     * @return string
     */
    public function getDescription(): string;
}