<?php
namespace LC\Registry\Stack;

use LC\Registry\Exception\RegistryKeyAlreadyExistException;

/**
 * Class RegistryStack
 * @package LC\Registry\Stack
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class RegistryStack
{
    /** @var array  */
    private $data;
    /** @var array  */
    private $keys;
    /** @var array  */
    private $scopes;

    /**
     * RegistryStack constructor.
     */
    public function __construct()
    {
        $this->data = [];
        $this->keys = [];
        $this->scopes  = [];
    }

    /**
     * @param RegistryItem $item
     * @return void
     * @throws RegistryKeyAlreadyExistException
     */
    public function addItem(RegistryItem $item)
    {
        if($this->keyExist($item->getKey())) {
            throw new RegistryKeyAlreadyExistException('The key ('.$item->getKey().') was already registered');
        }
        $this->keys[] = $item->getKey();
        $this->data[$item->getKey()] = $item;
        if($item->hasScope() && !in_array($item->getScope(), $this->scopes)) {
            $this->scopes[] = $item->getScope();
        }
    }

    /**
     * @param string $key
     * @param string $scope
     * @return RegistryItem
     */
    public function getItem($key, $scope = 'global')
    {
        return ($this->canAccess($key, $scope) ? $this->_getItem($key) : null);
    }

    /**
     * @param string $key
     * @param string $scope
     * @return bool
     */
    public function removeItem($key, $scope = 'global')
    {
        if($this->canRemove($key, $scope)) {
            $this->keys = array_diff($this->keys, [$key]);
            unset($this->data[$key]);
            return true;
        }
        return false;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return count($this->data);
    }

    /**
     * @return array
     */
    public function getExistingScopes()
    {
        return $this->scopes;
    }

    /**
     * @param string $key
     * @return bool
     */
    private function keyExist($key)
    {
        return in_array($key, $this->keys);
    }

    /**
     * @param string $key
     * @param string $scope
     * @return bool
     */
    private function canRemove($key, $scope)
    {
        return ($this->canAccess($key, $scope) ? (!$this->_getItem($key)->isProtected()) : false);
    }

    private function _getItem($key)
    {
        return $this->data[$key];
    }

    /**
     * @param string $key
     * @param string $scope
     * @return bool
     */
    protected function canAccess($key, $scope)
    {
        if(!empty($this->scopes) && !in_array($scope, $this->scopes)) {
            return false;
        }
        if (!$this->keyExist($key)) {
            return false;
        }
        if(!$this->_getItem($key)->hasScope()) {
            return true;
        }
        return ($this->_getItem($key)->getScope() === $scope);
    }
}