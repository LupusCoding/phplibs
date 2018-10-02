<?php

namespace LC\EventPro\Tests;

require_once 'Autoload.php';

/**
 * Class FactoryTest
 * @package LC\EventPro\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class ListenerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @return \LC\EventPro\Tests\MockListener
     */
    public function testInitListener()
    {
        $listener = new \LC\EventPro\Tests\MockListener();
        $this->assertInstanceOf(
            \LC\EventPro\Tests\MockListener::class,
            $listener
        );

        return $listener;
    }

    /**
     * @depends testInitListener
     * @param MockListener $listener
     * @return MockListener
     */
    public function testGetName(\LC\EventPro\Tests\MockListener $listener)
    {
        $this->assertSame('LC.EventPro.Tests.MockListener', $listener->getName());

        return $listener;
    }

    /**
     * @depends testGetName
     * @param MockListener $listener
     * @return MockListener
     */
    public function testListen(\LC\EventPro\Tests\MockListener $listener)
    {
        $catch = null;
        try {
            $listener->listen('my-test-event');
        } catch (\Exception $e) {
            $catch = $e;
        }
        $this->assertNull($catch);

        return $listener;
    }

    /**
     * @depends testListen
     * @param MockListener $listener
     * @return MockListener
     */
    public function testIsListeningOn(\LC\EventPro\Tests\MockListener $listener)
    {
        $this->assertTrue($listener->isListeningOn('my-test-event'));

        return $listener;
    }

    /**
     * @depends testIsListeningOn
     * @param MockListener $listener
     * @return MockListener
     */
    public function testHandleEvent(\LC\EventPro\Tests\MockListener $listener)
    {
        $event = new \LC\EventPro\Component\EventProEvent('my-test-event', [1,2,3]);
        $listener->handleEvent('my-test-event', $event);
        $this->assertSame('MockServer_handled_this_event', $event->getData()['mock_handled']);

        return $listener;
    }

    /**
     * @depends testHandleEvent
     * @param MockListener $listener
     * @return void
     */
    public function testUnlisten(\LC\EventPro\Tests\MockListener $listener)
    {
        $listener->unlisten('my-test-event');
        $this->assertFalse($listener->isListeningOn('my-test-event'));
    }

}