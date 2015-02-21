<?php
/**
 * @package axy\codecs\base64vlq
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\codecs\base64vlq\tests;

use axy\codecs\base64vlq\Signed;

/**
 * coversDefaultClass axy\codecs\base64vlq\Signed
 */
class SignedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::encode
     * covers ::decode
     * @dataProvider providerEncodeDecode
     * @param int $signed
     * @param int $encoded
     */
    public function testEncodeDecode($signed, $encoded)
    {
        $this->assertSame($encoded, Signed::encode($signed));
        $this->assertSame($signed, Signed::decode($encoded));
    }

    /**
     * @return array
     */
    public function providerEncodeDecode()
    {
        return [
            [0, 0],
            [1, 2],
            [10, 20],
            [123456, 246912],
            [-1, 3],
            [-123456, 246913],
        ];
    }

    /**
     * covers ::encodeBlock
     * covers ::decodeBlock
     * @dataProvider providerEncodeDecodeBlock
     * @param int[] $sBlock
     * @param int[] $eBlock
     */
    public function testEncodeDecodeBlock($sBlock, $eBlock)
    {
        $this->assertSame($eBlock, Signed::encodeBlock($sBlock));
        $this->assertSame($sBlock, Signed::decodeBlock($eBlock));
    }

    /**
     * @return array
     */
    public function providerEncodeDecodeBlock()
    {
        return [
            [[1, -234, 0, 134], [2, 469, 0, 268]],
        ];
    }
}
