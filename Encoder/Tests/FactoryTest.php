<?php

namespace LC\Encoder\Tests;

require_once 'Autoload.php';

use LC\Encoder\EncoderFactory;

/**
 * Class FactoryTest
 * @package LC\Encoder\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class FactoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @return void
     */
    public function testHaval1604()
    {
        $f = new EncoderFactory();
        $encoder = $f->haval1604();
        $this->assertInstanceOf(
            \LC\Encoder\Component\Haval1604Encoder::class,
            $encoder
        );
    }

    /**
     * @return void
     */
    public function testHaval1924()
    {
        $f = new EncoderFactory();
        $encoder = $f->haval1924();
        $this->assertInstanceOf(
            \LC\Encoder\Component\Haval1924Encoder::class,
            $encoder
        );
    }

    /**
     * @return void
     */
    public function testMd5()
    {
        $f = new EncoderFactory();
        $encoder = $f->md5();
        $this->assertInstanceOf(
            \LC\Encoder\Component\Md5Encoder::class,
            $encoder
        );
    }

    /**
     * @return void
     */
    public function testRipemd128()
    {
        $f = new EncoderFactory();
        $encoder = $f->ripemd128();
        $this->assertInstanceOf(
            \LC\Encoder\Component\Ripemd128Encoder::class,
            $encoder
        );
    }

    /**
     * @return void
     */
    public function testSha256()
    {
        $f = new EncoderFactory();
        $encoder = $f->sha256();
        $this->assertInstanceOf(
            \LC\Encoder\Component\Sha256Encoder::class,
            $encoder
        );
    }

    /**
     * @return void
     */
    public function testSha512()
    {
        $f = new EncoderFactory();
        $encoder = $f->sha512();
        $this->assertInstanceOf(
            \LC\Encoder\Component\Sha512Encoder::class,
            $encoder
        );
    }

    /**
     * @return void
     */
    public function testTiger1624()
    {
        $f = new EncoderFactory();
        $encoder = $f->tiger1624();
        $this->assertInstanceOf(
            \LC\Encoder\Component\Tiger1624Encoder::class,
            $encoder
        );
    }

    /**
     * @return void
     */
    public function testWhirlpool()
    {
        $f = new EncoderFactory();
        $encoder = $f->whirlpool();
        $this->assertInstanceOf(
            \LC\Encoder\Component\WhirlpoolEncoder::class,
            $encoder
        );
    }

}