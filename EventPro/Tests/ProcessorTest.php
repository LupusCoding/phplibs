<?php

namespace LC\EventPro\Tests;

use LC\EventPro\Component\EventProcessor;
use LC\EventPro\Factory;

require_once 'Autoload.php';

/**
 * Class FactoryTest
 * @package LC\EventPro\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class ProcessorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @return \LC\EventPro\Component\EventProcessor
     */
    public function testProcessor()
    {
        $f = new Factory();
        $processor = $f->processor(false);
        $this->assertInstanceOf(
            \LC\EventPro\Component\EventProcessor::class,
            $processor
        );
        return $processor;
    }

    /**
     * @depends testProcessor
     * @param \LC\EventPro\Component\EventProcessor $processor
     * @return void
     * @throws \Exception
     */
    public function testDispatchEventWithoutListener(\LC\EventPro\Component\EventProcessor $processor)
    {
        $this->expectException(\Exception::class);
        $event = $processor->dispatchEvent('my-test-event', [1,2,3]);
        $this->assertInstanceOf(
            \LC\EventPro\Component\EventProEvent::class,
            $event
        );
    }

    /**
     * @depends testProcessor
     * @param \LC\EventPro\Component\EventProcessor $processor
     * @return \LC\EventPro\Component\EventProcessor
     */
    public function testAddListener(\LC\EventPro\Component\EventProcessor $processor)
    {
        $listener = new \LC\EventPro\Tests\MockListener();

        $catch = null;
        try {
            $processor->addListener($listener);
        } catch (\Exception $e) {
            $catch = $e;
        }

        $this->assertNull($catch);

        return $processor;
    }

    /**
     * @depends testAddListener
     * @param \LC\EventPro\Component\EventProcessor $processor
     * @return \LC\EventPro\Component\EventProcessor
     */
    public function testGetListener(\LC\EventPro\Component\EventProcessor $processor)
    {
        $l_object = $processor->getListener('LC.EventPro.Tests.MockListener');
        $this->assertSame('LC.EventPro.Tests.MockListener', $l_object->getName());

        return $processor;
    }

    /**
     * @depends testGetListener
     * @param \LC\EventPro\Component\EventProcessor $processor
     * @return void
     * @throws \Exception
     */
    public function testDispatchEvent(\LC\EventPro\Component\EventProcessor $processor)
    {
        $processor->getListener('LC.EventPro.Tests.MockListener')->listen('my-test-event');

        $event = $processor->dispatchEvent('my-test-event', [1,2,3]);
        $this->assertSame('MockServer_handled_this_event', $event->getData()['mock_handled']);
    }

    /**
     * @void
     */
    public function testStaticProcessor()
    {
        $f = new Factory();
        $processor = $f->processor(true);
        $this->assertInstanceOf(
            \LC\EventPro\Component\EventProcessor::class,
            $processor
        );
    }

    /**
     * @depends testStaticProcessor
     * @return void
     * @throws \Exception
     */
    public function testStaticDispatchEventWithoutListener()
    {
        $this->expectException(\Exception::class);
        $event = EventProcessor::dispatch('my-test-event', [1,2,3]);
        $this->assertInstanceOf(
            \LC\EventPro\Component\EventProEvent::class,
            $event
        );
    }

    /**
     * @depends testStaticProcessor
     * @return void
     */
    public function testStaticAddListener()
    {
        $listener = new \LC\EventPro\Tests\MockListener();

        $catch = null;
        try {
            EventProcessor::append($listener);
        } catch (\Exception $e) {
            $catch = $e;
        }

        $this->assertNull($catch);
    }

    /**
     * @depends testStaticAddListener
     * @return void
     */
    public function testStaticGetListener()
    {
        $listener = EventProcessor::listener('LC.EventPro.Tests.MockListener');

        $this->assertSame('LC.EventPro.Tests.MockListener', $listener->getName());
    }

    /**
     * @depends testStaticGetListener
     * @return void
     * @throws \Exception
     */
    public function testStaticDispatchEvent()
    {
        EventProcessor::listener('LC.EventPro.Tests.MockListener')->listen('my-test-event');

        $event = EventProcessor::dispatch('my-test-event', [1,2,3]);
        $this->assertSame('MockServer_handled_this_event', $event->getData()['mock_handled']);
    }

}