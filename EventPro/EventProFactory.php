<?php

namespace LC\EventPro;

/**
 * Class EventProFactory
 * @package LC\EventPro
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class EventProFactory
{
    /**
     * @return Component\EventProcessor
     */
    public function processor($static = false): \LC\EventPro\Component\EventProcessor
    {
        if (TRUE === $static) {
            return \LC\EventPro\Component\EventProcessor::getInstance();
        }
        return new \LC\EventPro\Component\EventProcessor();
    }

    /**
     * @param string $event_name
     * @param array $data
     * @return Component\EventProEvent
     */
    public function event(string $event_name, array $data): \LC\EventPro\Component\EventProEvent
    {
        return new \LC\EventPro\Component\EventProEvent($event_name, $data);
    }
}