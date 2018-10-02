<?php

namespace LC\EventPro\Interfaces;

/**
 * Interface EventInterface
 * @package LC\EventPro
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
interface EventInterface
{
    // get event id / name
    public function getId(): string;

    // get data from event
    public function getData(): array;

    // set data for event?
    public function setData($data);
}