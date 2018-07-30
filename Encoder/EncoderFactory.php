<?php

namespace LC\Encoder;

use LC\Encoder\Component\Haval1604Encoder;
use LC\Encoder\Component\Haval1924Encoder;
use LC\Encoder\Component\Md5Encoder;
use LC\Encoder\Component\Ripemd128Encoder;
use LC\Encoder\Component\Sha256Encoder;
use LC\Encoder\Component\Sha512Encoder;
use LC\Encoder\Component\Tiger1624Encoder;
use LC\Encoder\Component\WhirlpoolEncoder;

/**
 * Class EncoderFactory
 * @package LC\Encoder
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class EncoderFactory
{
    /**
     * @return Haval1604Encoder
     */
    public function haval1604(): Haval1604Encoder
    {
        return new Haval1604Encoder();
    }

    /**
     * @return Haval1924Encoder
     */
    public function haval1924(): Haval1924Encoder
    {
        return new Haval1924Encoder();
    }

    /**
     * @return Md5Encoder
     */
    public function md5(): Md5Encoder
    {
        return new Md5Encoder();
    }

    /**
     * @return Ripemd128Encoder
     */
    public function ripemd128(): Ripemd128Encoder
    {
        return new Ripemd128Encoder();
    }

    /**
     * @return Sha256Encoder
     */
    public function sha256(): Sha256Encoder
    {
        return new Sha256Encoder();
    }

    /**
     * @return Sha512Encoder
     */
    public function sha512(): Sha512Encoder
    {
        return new Sha512Encoder();
    }

    /**
     * @return Tiger1624Encoder
     */
    public function tiger1624(): Tiger1624Encoder
    {
        return new Tiger1624Encoder();
    }

    /**
     * @return WhirlpoolEncoder
     */
    public function whirlpool(): WhirlpoolEncoder
    {
        return new WhirlpoolEncoder();
    }
}