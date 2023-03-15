<?php

namespace axy\codecs\base64vlq\tests;

use axy\codecs\base64vlq\Signed;

/**
 * coversDefaultClass axy\codecs\base64vlq\Signed
 */
class SignedTest extends BaseTestCase
{
    /**
     * covers ::encode
     * covers ::decode
     * @dataProvider providerEncodeDecode
     */
    public function testEncodeDecode(int $signed, int $encoded)
    {
        $this->assertSame($encoded, Signed::encode($signed));
        $this->assertSame($signed, Signed::decode($encoded));
    }

    public static function providerEncodeDecode(): array
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
    public function testEncodeDecodeBlock(array $sBlock, array $eBlock)
    {
        $this->assertSame($eBlock, Signed::encodeBlock($sBlock));
        $this->assertSame($sBlock, Signed::decodeBlock($eBlock));
    }

    public static function providerEncodeDecodeBlock(): array
    {
        return [
            [[1, -234, 0, 134], [2, 469, 0, 268]],
        ];
    }
}
