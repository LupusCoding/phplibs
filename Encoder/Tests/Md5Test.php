<?php

namespace LC\Encoder\Tests;

require_once 'Autoload.php';

use LC\Encoder\Component\Md5Encoder;
use LC\Encoder\EncoderFactory;

/**
 * Class Md5Test
 * @package LC\Encoder\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Md5Test extends \PHPUnit\Framework\TestCase
{
    public function testInit()
    {
        $f = new EncoderFactory();
        $encoder = $f->md5();
        $this->assertInstanceOf(
            Md5Encoder::class,
            $encoder
        );
    }

    public function testGetId()
    {
        $f = new EncoderFactory();
        $encoder = $f->md5();
        $this->assertEquals('md5', $encoder->getId());
    }

    public function testEncode()
    {
        $f = new EncoderFactory();
        $encoder = $f->md5();
        $this->assertEquals(
            '30c9d57f17fde9dbc06292a0cab085f4',
            $encoder->encode('Md5Test')
        );
    }
}