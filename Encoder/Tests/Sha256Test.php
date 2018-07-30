<?php

namespace LC\Encoder\Tests;

require_once 'Autoload.php';

use LC\Encoder\Component\Sha256Encoder;
use LC\Encoder\EncoderFactory;

/**
 * Class Sha256Test
 * @package LC\Encoder\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Sha256Test extends \PHPUnit\Framework\TestCase
{
    public function testInit()
    {
        $f = new EncoderFactory();
        $encoder = $f->sha256();
        $this->assertInstanceOf(
            Sha256Encoder::class,
            $encoder
        );
    }

    public function testGetId()
    {
        $f = new EncoderFactory();
        $encoder = $f->sha256();
        $this->assertEquals('sha256', $encoder->getId());
    }

    public function testEncode()
    {
        $f = new EncoderFactory();
        $encoder = $f->sha256();
        $this->assertEquals(
            '6533451da188a51481104a54ae14a07716f1247281a1739718a820ad98d80772',
            $encoder->encode('Sha256Test')
        );
    }
}