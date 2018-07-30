<?php

namespace LC\Encoder\Tests;

require_once 'Autoload.php';

use LC\Encoder\Component\Sha512Encoder;
use LC\Encoder\EncoderFactory;

/**
 * Class Sha512Test
 * @package LC\Encoder\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Sha512Test extends \PHPUnit\Framework\TestCase
{
    public function testInit()
    {
        $f = new EncoderFactory();
        $encoder = $f->sha512();
        $this->assertInstanceOf(
            Sha512Encoder::class,
            $encoder
        );
    }

    public function testGetId()
    {
        $f = new EncoderFactory();
        $encoder = $f->sha512();
        $this->assertEquals('sha512', $encoder->getId());
    }

    public function testEncode()
    {
        $f = new EncoderFactory();
        $encoder = $f->sha512();
        $this->assertEquals(
            'ba902db49c45b3142416aa4372924a5028139ed07f62d2e846527a08f9480524fe93da38f3005fdae6ea80dc7ca545ab137fa20c2cba7a43bbd5f9b1b6a718a7',
            $encoder->encode('Sha512Test')
        );
    }
}