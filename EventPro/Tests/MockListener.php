<?php

namespace LC\EventPro\Tests;

use \LC\EventPro\Component\Abstracts\AbstractListener;

/**
 * Class MockListener
 * @package LC\EventPro\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class MockListener extends  AbstractListener
{
    /** @var string  */
    protected $name = 'LC.EventPro.Tests.MockListener';

    /**
     * @inheritdoc
     */
    public function handleEvent($event_name, \LC\EventPro\Component\Abstracts\AbstractEvent &$event)
    {
        if ($this->isListeningOn($event_name)) {
            $data = $event->getData();
            $data['mock_handled'] = 'MockServer_handled_this_event';
            $event->setData($data);

            echo var_export($event->getData(), true);
        }
    }
}
