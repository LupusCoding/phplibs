<?php
namespace LC\Registry\Core;

use LC\Registry\Stack\RegistryItem;
use LC\Registry\Stack\RegistryStack;

/**
 * Class Scoped
 * @package LC\Registry\Core
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Scoped extends AbstractRegistry
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
     * @param string $scope
     * @param bool $protected
     * @return void
     * @throws \LC\Registry\Exception\RegistryKeyAlreadyExistException
     */
    public static function register($key, $value, $scope = 'global', $protected = false)
    {
        $item = new RegistryItem($key, $value, $protected, $scope);
        self::$stack->addItem($item);
    }

    /**
     * @param string $key
     * @return mixed
     */
    public static function get($key, $scope = 'global')
    {
        $item = self::$stack->getItem($key, $scope);
        return isset( $item ) ? $item->get() : null;
    }

    /**
     * @param string $key
     * @return void
     */
    public static function unregister($key, $scope = 'global')
    {
        self::$stack->removeItem($key, $scope);
    }

    /**
     * @return int
     */
    public static function getStackSize()
    {
        return self::$stack->getSize();
    }

    /**
     * @return array
     */
    public static function getExistingScopes()
    {
        return self::$stack->getExistingScopes();
    }
}