<?php

namespace LC\Encoder\Component;

use LC\Encoder\EncoderInterface;

/**
 * Class Sha256Encoder
 * @package LC\Encoder\Component
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Sha256Encoder implements EncoderInterface
{
    /**
     * @inheritdoc
     */
    public function getId(): string
    {
        return 'sha256';
    }

    /**
     * @inheritdoc
     */
    public function encode(string $message): string
    {
        return hash('sha256', $message);
    }
}