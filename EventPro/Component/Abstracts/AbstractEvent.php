<?php

namespace LC\EventPro\Component\Abstracts;

/**
 * Class AbstractEvent
 * @package LC\EventPro\Component\Abstracts
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
abstract class AbstractEvent implements \LC\EventPro\Interfaces\EventInterface
{
    /** @var string */
    protected $id;

    /** @var array */
    protected $data;

    /**
     * AbstractEvent constructor.
     * @param string $event_name
     * @param mixed $data
     */
    public function __construct($event_name, $data)
    {
        $this->id = $event_name;
        $this->setData($data);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        if (!is_array($data)) {
            $data[] = $data;
        }
        $this->data = $data;
    }
}