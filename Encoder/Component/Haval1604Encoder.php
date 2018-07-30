<?php

namespace LC\Encoder\Component;

use LC\Encoder\EncoderInterface;

/**
 * Class Haval1604Encoder
 * @package LC\Encoder\Component
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Haval1604Encoder implements EncoderInterface
{
    /**
     * @inheritdoc
     */
    public function getId(): string
    {
        return 'haval160,4';
    }

    /**
     * @inheritdoc
     */
    public function encode(string $message): string
    {
        return hash('haval160,4', $message);
    }
}