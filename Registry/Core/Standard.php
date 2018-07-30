<?php
namespace LC\Registry\Core;

use LC\Registry\Stack\RegistryItem;
use LC\Registry\Stack\RegistryStack;

/**
 * Class Standard
 * @package LC\Registry\Core
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Standard extends AbstractRegistry
{
    /**
     * @return AbstractRegistry|static
     */
    public static function init()
    {
        if(!isset(self::$instance)) {
            self::$stack = new RegistryStack();
            self::$instance = new static();
        }
        return self::$instance;
    }

    /**
     * @param string $key
     * @param mixed $value
     * @param bool $protected
     * @return void
     * @throws \LC\Registry\Exception\RegistryKeyAlreadyExistException
     */
    public static function register($key, $value, $protected = false)
    {
        $item = new RegistryItem($key, $value, $protected);
        self::$stack->addItem($item);
    }

    /**
     * @inheritdoc
     */
    public static function get($key)
    {
        $item = self::$stack->getItem($key);
        return isset( $item ) ? $item->get() : null;
    }

    /**
     * @inheritdoc
     */
    public static function unregister($key)
    {
        self::$stack->removeItem($key);
    }

    /**
     * @return int
     */
    public static function getStackSize()
    {
        return self::$stack->getSize();
    }
}