<?php

namespace LC\Encoder\Component;

use LC\Encoder\EncoderInterface;

/**
 * Class Haval1924Encoder
 * @package LC\Encoder\Component
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Haval1924Encoder implements EncoderInterface
{
    /**
     * @inheritdoc
     */
    public function getId(): string
    {
        return 'haval192,4';
    }

    /**
     * @inheritdoc
     */
    public function encode(string $message): string
    {
        return hash('haval192,4', $message);
    }
}