<?php
namespace LC\Registry\Tests;

require_once 'Autoload.php';

use LC\Registry\Core\Mini;

/**
 * Class MiniTest
 * @package LC\Registry\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class MiniTest extends \PHPUnit\Framework\TestCase
{

    public function testInit()
    {
        $mini = Mini::init();
        $this->assertInstanceOf(
            \LC\Registry\Core\AbstractRegistry::class,
            $mini
        );
    }

    public function testRegister()
    {
        $mini = Mini::init();

        $mini::register('value_str', 'value 1');
        $mini::register('value_int', 123);
        $mini::register('value_arr', ['abc',123]);

        $stack_size = $mini::getStackSize();
        $this->assertEquals(3, $stack_size);
    }

    /**
     * @depends testRegister
     * @return void
     */
    public function testGet()
    {
        $mini = Mini::init();

        $val_str = $mini::get('value_str');
        $this->assertEquals('value 1', $val_str);

        $val_int = $mini::get('value_int');
        $this->assertEquals(123, $val_int);

        $val_arr = $mini::get('value_arr');
        $this->assertEquals(['abc',123], $val_arr);
    }

    /**
     * @depends testRegister
     * @return void
     */
    public function testUnregister()
    {
        $mini = Mini::init();

        $mini::unregister('value_str');
        $val_str = $mini::get('value_str');
        $this->assertEquals(null, $val_str);

        $mini::unregister('value_int');
        $val_int = $mini::get('value_int');
        $this->assertEquals(null, $val_int);

        $mini::unregister('value_arr');
        $val_arr = $mini::get('value_arr');
        $this->assertEquals(null, $val_arr);
    }

    public function testDestroy()
    {
        $mini = Mini::init();

        $mini = $mini::destroy();
        $this->assertEquals(null, $mini);
    }
}
