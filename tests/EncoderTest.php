<?php
/**
 * @package axy\codecs\base64vlq
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\codecs\base64vlq\tests;

use axy\codecs\base64vlq\Encoder;

/**
 * coversDefaultClass axy\codecs\base64vlq\Encoder
 */
class EncoderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::getStandardInstance
     * covers ::encode
     * covers ::decode
     */
    public function testStandard()
    {
        $encoder = Encoder::getStandardInstance();
        $this->assertInstanceOf('axy\codecs\base64vlq\Encoder', $encoder);
        $this->assertSame($encoder, Encoder::getStandardInstance());
        $numbers = [35, -123451, 0, 9234, -546, 3333];
        $encoded = 'mC3jxHAkhSliBqwG';
        $this->assertSame($encoded, $encoder->encode($numbers));
        $this->assertSame($numbers, $encoder->decode($encoded));
        $encoder2 = new Encoder();
        $this->assertSame($numbers, $encoder2->decode($encoded));
    }

    /**
     * covers ::encode
     * covers ::decode
     */
    public function testCustom()
    {
        $encoder = new Encoder('QWE3RTY4', 3, false);
        $numbers = [5, 1234, 0, 1];
        $encoded = 'TWYRT4RWQW';
        $this->assertSame($encoded, $encoder->encode($numbers));
        $this->assertSame($numbers, $encoder->decode($encoded));
        $this->assertSame('TW', $encoder->encode(5));
        $this->assertSame([5], $encoder->decode(['T', 'W']));
    }
}
