<?php

namespace LC\EventPro\Component;

/**
 * Class EventPro
 * @package LC\EventPro\Component
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class EventProcessor
{
    /** @var \LC\EventPro\Component\Abstracts\AbstractListener[] */
    protected $listeners;

    /** @var \LC\EventPro\Component\EventProcessor */
    protected static $instance;

    /**
     * EventProcessor constructor.
     */
    public function __construct()
    {
        $this->listeners = [];
    }

    /**
     * @return EventProcessor|static
     */
    public static function getInstance()
    {
        if (!self::$instance instanceof \LC\EventPro\Component\EventProcessor) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    /**
     * @param Abstracts\AbstractListener $listener
     */
    public function addListener(\LC\EventPro\Component\Abstracts\AbstractListener $listener)
    {
        if (!array_key_exists($listener->getName(), $this->listeners)) {
            $this->listeners[$listener->getName()] = $listener;
        }
    }

    public static function append(\LC\EventPro\Component\Abstracts\AbstractListener $listener)
    {
        self::getInstance()->addListener($listener);
    }

    /**
     * @param string $listener_name
     * @return Abstracts\AbstractListener
     */
    public function getListener(string $listener_name): \LC\EventPro\Component\Abstracts\AbstractListener
    {
        if (array_key_exists($listener_name, $this->listeners)) {
            return $this->listeners[$listener_name];
        }
        return null;
    }

    /**
     * @param string $listener_name
     * @return Abstracts\AbstractListener
     */
    public static function listener(string $listener_name): \LC\EventPro\Component\Abstracts\AbstractListener
    {
        return self::getInstance()->getListener($listener_name);
    }

    /**
     * @param string $event_name
     * @param mixed $data
     * @return Abstracts\AbstractEvent|EventProEvent
     * @throws \Exception
     */
    public function dispatchEvent(string $event_name, $data)
    {
        if (!$data instanceof \LC\EventPro\Component\Abstracts\AbstractEvent) {
            $event = new \LC\EventPro\Component\EventProEvent($event_name, $data);
        } else {
            $event = $data;
        }
        if (empty($this->listeners)) {
            throw new \Exception('no listeners provided');
        }
        foreach ($this->listeners as $listener) {
            if ($listener->isListeningOn($event_name)) {
                $listener->handleEvent($event_name, $event);
            }
        }
        return $event;
    }

    /**
     * @param string $event_name
     * @param mixed $data
     * @return Abstracts\AbstractEvent|EventProEvent
     * @throws \Exception
     */
    public static function dispatch(string $event_name, $data)
    {
        return self::$instance->dispatchEvent($event_name, $data);
    }


}