<?php

namespace LC\Encoder\Tests;

require_once 'Autoload.php';

use LC\Encoder\Component\Ripemd128Encoder;
use LC\Encoder\EncoderFactory;

/**
 * Class Ripemd128Test
 * @package LC\Encoder\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Ripemd128Test extends \PHPUnit\Framework\TestCase
{
    public function testInit()
    {
        $f = new EncoderFactory();
        $encoder = $f->ripemd128();
        $this->assertInstanceOf(
            Ripemd128Encoder::class,
            $encoder
        );
    }

    public function testGetId()
    {
        $f = new EncoderFactory();
        $encoder = $f->ripemd128();
        $this->assertEquals('ripemd128', $encoder->getId());
    }

    public function testEncode()
    {
        $f = new EncoderFactory();
        $encoder = $f->ripemd128();
        $this->assertEquals(
            '41b0ca871e61c2b842e434e8a24bbf41',
            $encoder->encode('Ripemd128Test')
        );
    }
}