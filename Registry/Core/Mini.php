<?php
namespace LC\Registry\Core;

/**
 * Class Mini
 * @package LC\Registry\Core
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Mini extends AbstractRegistry
{
    /**
     * @return AbstractRegistry|static
     */
    public static function init()
    {
        if(!isset(self::$instance)) {
            self::$stack = [];
            self::$instance = new static();
        }
        return self::$instance;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public static function register($key, $value)
    {
        self::$stack[$key] = $value;
    }

    /**
     * @inheritdoc
     */
    public static function get($key)
    {
        return isset(self::$stack[$key]) ? self::$stack[$key] : null;
    }

    /**
     * @inheritdoc
     */
    public static function unregister($key)
    {
        unset(self::$stack[$key]);
    }

    /**
     * @return int
     */
    public static function getStackSize()
    {
        return count(self::$stack);
    }
}