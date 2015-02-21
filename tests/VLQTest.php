<?php
/**
 * @package axy\codecs\base64vlq
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\codecs\base64vlq\tests;

use axy\codecs\base64vlq\VLQ;

/**
 * coversDefaultClass axy\codecs\base64vlq\VLQ
 */
class VLQTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::encode
     * covers ::decode
     */
    public function testDefault()
    {
        $vlq = new VLQ();
        $this->assertSame([50, 35, 24], $vlq->encode(12345));
        $this->assertSame([50, 35, 24], $vlq->encode([12345]));
        $this->assertSame([6, 50, 35, 24, 0, 41, 6, 54, 1], $vlq->encode([3, 12345, 0, -100, 27]));
        $this->assertSame([3, 12345, 0, -104, 27], $vlq->decode([6, 50, 35, 24, 0, 49, 6, 54, 1]));
    }

    /**
     * covers ::encode
     * covers ::decode
     */
    public function testBits()
    {
        $vlq = new VLQ(4);
        $this->assertSame([6, 10, 14, 9, 8, 6, 0, 9, 9, 3, 14, 6], $vlq->encode([3, 12345, 0, -100, 27]));
        $this->assertSame([3, 12345, 0, -100, 27], $vlq->decode([6, 10, 14, 9, 8, 6, 0, 9, 9, 3, 14, 6]));
    }

    /**
     * covers ::encode
     * covers ::decode
     */
    public function testSigned()
    {
        $vlq = new VLQ(4, false);
        $this->assertSame([3, 9, 15, 8, 8, 3], $vlq->encode([3, 12345]));
        $this->assertSame([3, 12345], $vlq->decode([3, 9, 15, 8, 8, 3]));
    }

    /**
     * covers ::decode
     * @expectedException \axy\codecs\base64vlq\errors\InvalidVLQSequence
     */
    public function testInvalid()
    {
        $vlq = new VLQ();
        $vlq->decode([1, 50]);
    }
}
