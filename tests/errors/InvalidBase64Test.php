<?php

namespace axy\codecs\base64vlq\tests\errors;

use axy\codecs\base64vlq\errors\InvalidBase64;
use axy\codecs\base64vlq\tests\BaseTestCase;

/**
 * coversDefaultClass axy\codecs\base64vlq\errors\InvalidBase64
 */
class InvalidBase64Test extends BaseTestCase
{
    public function testCreate()
    {
        $previous = new \RuntimeException();
        $e = new InvalidBase64('AAA', $previous);
        $this->assertSame('AAA', $e->getBase64string());
        $this->assertSame('Base-64 string is invalid: "AAA"', $e->getMessage());
        $this->assertSame($previous, $e->getPrevious());
    }
}
