<?php

namespace axy\codecs\base64vlq\tests\errors;

use axy\codecs\base64vlq\errors\InvalidBase64Input;
use axy\codecs\base64vlq\tests\BaseTestCase;

/**
 * coversDefaultClass axy\codecs\base64vlq\errors\InvalidBase64Input
 */
class InvalidBase64InputTest extends BaseTestCase
{
    public function testCreate()
    {
        $previous = new \RuntimeException();
        $e = new InvalidBase64Input(10, $previous);
        $this->assertSame(10, $e->getInput());
        $this->assertSame('Number 10 is not found in Base64 alphabet', $e->getMessage());
        $this->assertSame($previous, $e->getPrevious());
    }
}
