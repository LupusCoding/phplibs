<?php
namespace LC\Registry\Core;

use LC\Registry\Exception\RegistryKeyAlreadyExistException;
use LC\Registry\Stack\RegistryStack;

/**
 * Class AbstractRegistry
 * @package LC\Registry\Core
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
abstract class AbstractRegistry
{
    /** @var \LC\Registry\Core\AbstractRegistry */
    protected static $instance;
    /** @var RegistryStack|array */
    protected static $stack;

    /**
     * @return \LC\Registry\Core\AbstractRegistry
     */
    public static abstract function init();

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     * @throws RegistryKeyAlreadyExistException
     */
    public static abstract function register($key, $value);

    /**
     * @param string $key
     * @return mixed
     */
    public static abstract function get($key);

    /**
     * @param string $key
     * @return void
     */
    public static abstract function unregister($key);

    /**
     * @return int
     */
    public static abstract function getStackSize();

    /**
     * @return null
     */
    public final static function destroy()
    {
        return (self::$instance = null);
    }

}