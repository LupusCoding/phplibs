<?php

namespace LC\EventPro;

/**
 * Class EventProFactory
 * @package LC\EventPro
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Factory
{
    /**
     * @return Component\EventProcessor
     */
    public function processor($static = true): \LC\EventPro\Component\EventProcessor
    {
        if (FALSE === $static) {
            return new \LC\EventPro\Component\EventProcessor();
        }
        return \LC\EventPro\Component\EventProcessor::getInstance();
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