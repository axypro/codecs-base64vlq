<?php
/**
 * @package axy\codecs\base64vlq
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\codecs\base64vlq\tests\errors;

use axy\codecs\base64vlq\errors\InvalidVLQSequence;

/**
 * coversDefaultClass axy\codecs\base64vlq\errors\InvalidVLQSequence
 */
class InvalidVLQSequenceTest extends \PHPUnit_Framework_TestCase
{
    public function testCreate()
    {
        $previous = new \RuntimeException();
        $e = new InvalidVLQSequence([1, 2, 3], $previous);
        $this->assertSame([1, 2, 3], $e->getDigits());
        $this->assertSame('VLQ sequence is invalid: [1,2,3]', $e->getMessage());
        $this->assertSame($previous, $e->getPrevious());
    }
}
