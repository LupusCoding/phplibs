<?php

namespace LC\Encoder\Component;

use LC\Encoder\EncoderInterface;

/**
 * Class Tiger1624Encoder
 * @package LC\Encoder\Component
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Tiger1624Encoder implements EncoderInterface
{
    /**
     * @inheritdoc
     */
    public function getId(): string
    {
        return 'tiger192,4';
    }

    /**
     * @inheritdoc
     */
    public function encode(string $message): string
    {
        return hash('tiger192,4', $message);
    }
}