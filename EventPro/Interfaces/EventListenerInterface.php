<?php

namespace LC\EventPro\Interfaces;

/**
 * Interface EventListenerInterface
 * @package LC\EventPro
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
interface EventListenerInterface
{
    // get Listener name
    public function getName(): string;

    // set listen on event xy
    public function listen($event_name);

    // remove listen on event
    public function unlisten($event_name);

    // does listen on event xy?
    public function isListeningOn($event_name): bool;

    // handle event with: event_name and original event object
    public function handleEvent($event_name, \LC\EventPro\Component\Abstracts\AbstractEvent &$event);
}