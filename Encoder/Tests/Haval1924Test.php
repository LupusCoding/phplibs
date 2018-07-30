<?php

namespace LC\Encoder\Tests;

require_once 'Autoload.php';

use LC\Encoder\Component\Haval1924Encoder;
use LC\Encoder\EncoderFactory;

/**
 * Class Haval1924Test
 * @package LC\Encoder\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Haval1924Test extends \PHPUnit\Framework\TestCase
{
    public function testInit()
    {
        $f = new EncoderFactory();
        $encoder = $f->haval1924();
        $this->assertInstanceOf(
            Haval1924Encoder::class,
            $encoder
        );
    }

    public function testGetId()
    {
        $f = new EncoderFactory();
        $encoder = $f->haval1924();
        $this->assertEquals('haval192,4', $encoder->getId());
    }

    public function testEncode()
    {
        $f = new EncoderFactory();
        $encoder = $f->haval1924();
        $this->assertEquals(
            '6829cf386b864000d62626641331483702cd985510d19bcf',
            $encoder->encode('Haval1924Test')
        );
    }
}