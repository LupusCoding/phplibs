<?php

namespace LC\Encoder\Tests;

require_once 'Autoload.php';

use LC\Encoder\Component\Tiger1624Encoder;
use LC\Encoder\EncoderFactory;

/**
 * Class Tiger1624Test
 * @package LC\Encoder\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Tiger1624Test extends \PHPUnit\Framework\TestCase
{
    public function testInit()
    {
        $f = new EncoderFactory();
        $encoder = $f->tiger1624();
        $this->assertInstanceOf(
            Tiger1624Encoder::class,
            $encoder
        );
    }

    public function testGetId()
    {
        $f = new EncoderFactory();
        $encoder = $f->tiger1624();
        $this->assertEquals('tiger192,4', $encoder->getId());
    }

    public function testEncode()
    {
        $f = new EncoderFactory();
        $encoder = $f->tiger1624();
        $this->assertEquals(
            'faa5c5821c422a372486387ef7d2ae1bf7f34c68c69c8459',
            $encoder->encode('Tiger1624Test')
        );
    }
}