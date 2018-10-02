<?php

namespace LC\EventPro\Tests;

use LC\EventPro\Factory;

require_once 'Autoload.php';

/**
 * Class FactoryTest
 * @package LC\EventPro\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class FactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @return void
     */
    public function testFactory()
    {
        $f = new Factory();
        $this->assertInstanceOf(
            \LC\EventPro\Factory::class,
            $f
        );
    }

    /**
     * @return void
     */
    public function testProcessor()
    {
        $f = new Factory();
        $processor = $f->processor(false);
        $this->assertInstanceOf(
            \LC\EventPro\Component\EventProcessor::class,
            $processor
        );
    }

    /**
     * @return void
     */
    public function testProcessorStatic()
    {
        $f = new Factory();
        $processor = $f->processor(true);
        $this->assertInstanceOf(
            \LC\EventPro\Component\EventProcessor::class,
            $processor
        );
    }

    /**
     * @return void
     */
    public function testEvent()
    {
        $f = new Factory();
        $event = $f->event('my-test-event', [1,2,3]);
        $this->assertInstanceOf(
            \LC\EventPro\Component\Abstracts\AbstractEvent::class,
            $event
        );
    }

}
