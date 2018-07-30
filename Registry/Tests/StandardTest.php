<?php
namespace LC\Registry\Tests;

require_once 'Autoload.php';

use LC\Registry\Core\Standard;

/**
 * Class StandardTest
 * @package LC\Registry\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class StandardTest extends \PHPUnit\Framework\TestCase
{

    public function testInit()
    {
        $standard = Standard::init();
        $this->assertInstanceOf(
            \LC\Registry\Core\AbstractRegistry::class,
            $standard
        );
    }

    public function testRegister()
    {
        $standard = Standard::init();

        $standard::register('value_str', 'value 1');
        $standard::register('value_int', 123);
        $standard::register('value_arr', ['abc',123]);
        $standard::register('value_protected', 'protected', true);

        $stack_size = $standard::getStackSize();
        $this->assertEquals(4, $stack_size);
    }

    /**
     * @expectedException \LC\Registry\Exception\RegistryKeyAlreadyExistException
     * @return void
     */
    public function testDoubleRegister()
    {
        $standard = Standard::init();

        $standard::register('double_value','first try');
        $standard::register('double_value','second try');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @return void
     */
    public function testEmptyKey()
    {
        $standard = Standard::init();

        $standard::register('','empty key');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @return void
     */
    public function testEmptyValue()
    {
        $standard = Standard::init();

        $standard::register('empty_val','');
    }

    /**
     * @expectedException \LC\Registry\Exception\RegistryKeyInvalidFormatException
     * @return void
     */
    public function testInvalidKey()
    {
        $standard = Standard::init();

        $standard::register('invalid key','some-value');
    }

    /**
     * @depends testRegister
     * @return void
     */
    public function testGet()
    {
        $standard = Standard::init();

        $val_str = $standard::get('value_str');
        $this->assertEquals('value 1', $val_str);

        $val_int = $standard::get('value_int');
        $this->assertEquals(123, $val_int);

        $val_arr = $standard::get('value_arr');
        $this->assertEquals(['abc',123], $val_arr);

        $val_protected = $standard::get('value_protected');
        $this->assertEquals('protected', $val_protected);
    }

    /**
     * @depends testRegister
     * @return void
     */
    public function testUnregister()
    {
        $standard = Standard::init();

        $standard::unregister('value_str');
        $val_str = $standard::get('value_str');
        $this->assertEquals(null, $val_str);

        $standard::unregister('value_int');
        $val_int = $standard::get('value_int');
        $this->assertEquals(null, $val_int);

        $standard::unregister('value_arr');
        $val_arr = $standard::get('value_arr');
        $this->assertEquals(null, $val_arr);

        $standard::unregister('value_protected');
        $val_protected = $standard::get('value_protected');
        $this->assertEquals('protected', $val_protected);
    }

    public function testDestroy()
    {
        $standard = Standard::init();

        $standard = $standard::destroy();
        $this->assertEquals(null, $standard);
    }
}
