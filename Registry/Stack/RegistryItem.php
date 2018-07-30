<?php
namespace LC\Registry\Stack;
use LC\Registry\Exception\RegistryKeyInvalidFormatException;

/**
 * Class RegistryItem
 * @package LC\Registry\Stack
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class RegistryItem
{
    /** @var string */
    private $key;
    /** @var mixed */
    private $value;
    /** @var bool */
    private $protected;
    /** @var string  */
    protected $scope;

    /**
     * RegistryItem constructor.
     * @param string $key
     * @param mixed $value
     * @param bool $protected
     * @param string $scope
     * @throws RegistryKeyInvalidFormatException
     */
    public function __construct($key, $value, $protected = false, $scope = '')
    {
        if($key === '') {
            throw new \InvalidArgumentException('Invalid argument passed for key (' . $key . ')');
        }
        if($value === '') {
            throw new \InvalidArgumentException('Invalid argument passed for value (' . $value . ')');
        }
        if(!$this->isValidKey($key)) {
            throw new RegistryKeyInvalidFormatException($key);
        }
        $this->key = $key;
        $this->value = $value;
        $this->protected = $protected;
        $this->scope = $scope;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @return bool
     */
    public function isProtected()
    {
        return $this->protected;
    }

    /**
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @return bool
     */
    public function hasScope()
    {
        return ($this->scope !== '');
    }

    /**
     * @param string $key
     * @return bool
     */
    private function isValidKey($key)
    {
        return !preg_match('/[^A-Za-z0-9#\_\-$]/', $key);
    }
}