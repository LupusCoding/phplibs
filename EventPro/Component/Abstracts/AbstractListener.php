<?php

namespace LC\EventPro\Component\Abstracts;

/**
 * Class AbstractListener
 * @package LC\EventPro\Component\Abstracts
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
abstract class AbstractListener implements \LC\EventPro\Interfaces\EventListenerInterface
{
    /** @var string  */
    protected $name;

    /** @var array */
    protected $events;

    public function __construct()
    {
        $this->events = [];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function listen($event_name)
    {
        if (!in_array($event_name, $this->events)) {
            $this->events[] = $event_name;
        }
    }

    public function unlisten($event_name)
    {
        if (!(FALSE === ($ek = array_search($event_name, $this->events)))) {
            unset($this->events[$ek]);
        }
    }

    public function isListeningOn($event_name): bool
    {
        return (in_array($event_name, $this->events));
    }

    abstract public function handleEvent($event_name, \LC\EventPro\Component\Abstracts\AbstractEvent &$event);
}