<?php
namespace LC\Registry\Tests;

require_once 'Autoload.php';

use LC\Registry\Core\Scoped;

/**
 * Class ScopedTest
 * @package LC\Registry\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class ScopedTest extends \PHPUnit\Framework\TestCase
{

    public function testInit()
    {
        $scoped = Scoped::init();
        $this->assertInstanceOf(
            \LC\Registry\Core\AbstractRegistry::class,
            $scoped
        );
    }

    public function testRegister()
    {
        $scoped = Scoped::init();

        $scoped::register('value_str', 'value 1');
        $scoped::register('value_int', 123);
        $scoped::register('value_arr', ['abc',123]);
        $scoped::register('value_scoped', 'scoped', 'ScopedTest');
        $scoped::register('value_protected', 'protected', 'global',  true);

        $stack_size = $scoped::getStackSize();
        $this->assertEquals(5, $stack_size);

        $existing_scopes = $scoped::getExistingScopes();
        $this->assertEquals(['global','ScopedTest'], $existing_scopes);
    }

    /**
     * @expectedException \LC\Registry\Exception\RegistryKeyAlreadyExistException
     * @return void
     */
    public function testDoubleRegister()
    {
        $scoped = Scoped::init();

        $scoped::register('double_value','first try');
        $scoped::register('double_value','second try');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @return void
     */
    public function testEmptyKey()
    {
        $scoped = Scoped::init();

        $scoped::register('','empty key');
    }

    /**
     * @expectedException \InvalidArgumentException
     * @return void
     */
    public function testEmptyValue()
    {
        $scoped = Scoped::init();

        $scoped::register('empty_val','');
    }

    /**
     * @expectedException \LC\Registry\Exception\RegistryKeyInvalidFormatException
     * @return void
     */
    public function testInvalidKey()
    {
        $scoped = Scoped::init();

        $scoped::register('invalid key','some-value');
    }

    /**
     * @depends testRegister
     * @return void
     */
    public function testGet()
    {
        $scoped = Scoped::init();

        $val_str = $scoped::get('value_str');
        $this->assertEquals('value 1', $val_str);

        $val_int = $scoped::get('value_int');
        $this->assertEquals(123, $val_int);

        $val_arr = $scoped::get('value_arr');
        $this->assertEquals(['abc',123], $val_arr);

        $val_scoped = $scoped::get('value_scoped', 'ScopedTest');
        $this->assertEquals('scoped', $val_scoped);

        $val_protected = $scoped::get('value_protected');
        $this->assertEquals('protected', $val_protected);
    }

    /**
     * @depends testRegister
     * @return void
     */
    public function testUnregister()
    {
        $scoped = Scoped::init();

        $scoped::unregister('value_str');
        $val_str = $scoped::get('value_str');
        $this->assertEquals(null, $val_str);

        $scoped::unregister('value_int');
        $val_int = $scoped::get('value_int');
        $this->assertEquals(null, $val_int);

        $scoped::unregister('value_arr');
        $val_arr = $scoped::get('value_arr');
        $this->assertEquals(null, $val_arr);

        $scoped::unregister('value_scoped', 'ScopedTest');
        $val_scoped = $scoped::get('value_scoped', 'ScopedTest');
        $this->assertEquals(null, $val_scoped);

        $scoped::unregister('value_protected');
        $val_protected = $scoped::get('value_protected');
        $this->assertEquals('protected', $val_protected);
    }

    public function testDestroy()
    {
        $scoped = Scoped::init();

        $scoped = $scoped::destroy();
        $this->assertEquals(null, $scoped);
    }
}
