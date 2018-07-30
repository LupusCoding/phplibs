<?php

namespace LC\Encoder;

/**
 * Interface EncoderInterface
 * @package LC\Encoder
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
interface EncoderInterface
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @param string $message
     * @return string
     */
    public function encode(string $message): string;
}