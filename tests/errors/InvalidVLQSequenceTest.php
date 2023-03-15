<?php

namespace axy\codecs\base64vlq\tests\errors;

use axy\codecs\base64vlq\errors\InvalidVLQSequence;
use axy\codecs\base64vlq\tests\BaseTestCase;

/**
 * coversDefaultClass axy\codecs\base64vlq\errors\InvalidVLQSequence
 */
class InvalidVLQSequenceTest extends BaseTestCase
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
