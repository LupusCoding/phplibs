<?php

namespace LC\Encoder\Tests;

require_once 'Autoload.php';

use LC\Encoder\Component\Haval1604Encoder;
use LC\Encoder\EncoderFactory;

/**
 * Class Haval1604Test
 * @package LC\Encoder\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Haval1604Test extends \PHPUnit\Framework\TestCase
{
    public function testInit()
    {
        $f = new EncoderFactory();
        $encoder = $f->haval1604();
        $this->assertInstanceOf(
            Haval1604Encoder::class,
            $encoder
        );
    }

    public function testGetId()
    {
        $f = new EncoderFactory();
        $encoder = $f->haval1604();
        $this->assertEquals('haval160,4', $encoder->getId());
    }

    public function testEncode()
    {
        $f = new EncoderFactory();
        $encoder = $f->haval1604();
        $this->assertEquals(
            '1efc4ac187c8d5cb476028058380b4ae1909c74c',
            $encoder->encode('Haval1604Test')
        );
    }
}