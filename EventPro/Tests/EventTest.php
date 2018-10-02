<?php

namespace LC\EventPro\Tests;

require_once 'Autoload.php';

/**
 * Class FactoryTest
 * @package LC\EventPro\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class EventTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @return \LC\EventPro\Component\EventProEvent
     */
    public function testEvent()
    {
        $event = new \LC\EventPro\Component\EventProEvent('my-test-event', [1,2,3]);
        $this->assertInstanceOf(
            \LC\EventPro\Component\EventProEvent::class,
            $event
        );
        return $event;
    }

    /**
     * @depends testEvent
     * @param \LC\EventPro\Component\EventProEvent $event
     * @return \LC\EventPro\Component\EventProEvent
     */
    public function testGetId(\LC\EventPro\Component\EventProEvent $event)
    {
        $this->assertSame(
            'my-test-event',
            $event->getId()
        );
        return $event;
    }

    /**
     * @depends testGetId
     * @param \LC\EventPro\Component\EventProEvent $event
     * @return \LC\EventPro\Component\EventProEvent
     */
    public function testGetData(\LC\EventPro\Component\EventProEvent $event)
    {
        $this->assertSame(
            [1,2,3],
            $event->getData()
        );
        return $event;
    }

    /**
     * @depends testGetData
     * @param \LC\EventPro\Component\EventProEvent $event
     * @return void
     */
    public function testSetData(\LC\EventPro\Component\EventProEvent $event)
    {
        $event->setData([4,5,6]);
        $this->assertSame(
            [4,5,6],
            $event->getData()
        );
    }
}