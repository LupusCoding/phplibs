<?php

namespace LC\Encoder\Tests;

require_once 'Autoload.php';

use LC\Encoder\Component\WhirlpoolEncoder;
use LC\Encoder\EncoderFactory;

/**
 * Class WhirlpoolTest
 * @package LC\Encoder\Tests
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class WhirlpoolTest extends \PHPUnit\Framework\TestCase
{
    public function testInit()
    {
        $f = new EncoderFactory();
        $encoder = $f->whirlpool();
        $this->assertInstanceOf(
            WhirlpoolEncoder::class,
            $encoder
        );
    }

    public function testGetId()
    {
        $f = new EncoderFactory();
        $encoder = $f->whirlpool();
        $this->assertEquals('whirlpool', $encoder->getId());
    }

    public function testEncode()
    {
        $f = new EncoderFactory();
        $encoder = $f->whirlpool();
        $this->assertEquals(
            '7d240281593b7df535a82511cabefc5468176ae475427df23ef88236441d73b8cf374217001540f38c8dc1052757bd8c3175a1357f82b03230a4e611a54b1c27',
            $encoder->encode('WhirlpoolTest')
        );
    }
}