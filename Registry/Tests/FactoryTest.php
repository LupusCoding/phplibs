<?php
namespace LC\Registry\Tests;

require_once 'Autoload.php';

use LC\Registry\Factory;

/**
 * Class FactoryTest
 * @package LC\Registry\Tests
 * @author Ralph Dittrich <dittrich@qualitus.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class FactoryTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @return void
     */
    public function testStandard()
    {
        $f = new Factory();
        $standard = $f->standard();
        $this->assertInstanceOf(
            \LC\Registry\Core\Standard::class,
            $standard
        );
        $standard->destroy();
    }

    /**
     * @return void
     */
    public function testScoped()
    {
        $f = new Factory();
        $scoped = $f->scoped();
        $this->assertInstanceOf(
            \LC\Registry\Core\Scoped::class,
            $scoped
        );
        $scoped->destroy();
    }

    /**
     * @return void
     */
    public function testMini()
    {
        $f = new Factory();
        $mini = $f->mini();
        $this->assertInstanceOf(
            \LC\Registry\Core\Mini::class,
            $mini
        );
        $mini->destroy();
    }
}
