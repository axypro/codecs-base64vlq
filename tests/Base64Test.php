<?php
/**
 * @package axy\codecs\base64vlq
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\codecs\base64vlq\tests;

use axy\codecs\base64vlq\Base64;

/**
 * coversDefaultClass axy\codecs\base64vlq\Base64
 */
class Base64Test extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::encode
     * covers ::decode
     */
    public function testDefault()
    {
        $base64 = new Base64();
        $numbers = [53, 12, 0, 25, 11, 63];
        $based = '1MAZL/';
        $this->assertSame($based, $base64->encode($numbers));
        $this->assertSame($numbers, $base64->decode($based));
        $this->assertSame($numbers, $base64->decode(['1', 'M', 'A', 'Z', 'L', '/']));
    }

    /**
     * covers ::encode
     * covers ::decode
     */
    public function testCustomAlphabet()
    {
        $base64 = new Base64('qwerty');
        $numbers = [3, 5, 1];
        $based = 'ryw';
        $this->assertSame($based, $base64->encode($numbers));
        $this->assertSame($numbers, $base64->decode($based));
    }

    /**
     * covers ::encode
     * covers ::decode
     */
    public function testCustomDictAlphabet()
    {
        $base64 = new Base64([23 => 'Q', 17 => 'l', 24 => '*']);
        $numbers = [17, 23, 17, 24, 23];
        $based = 'lQl*Q';
        $this->assertSame($based, $base64->encode($numbers));
        $this->assertSame($numbers, $base64->decode($based));
    }

    /**
     * covers ::encode
     * covers ::decode
     * @expectedException \axy\codecs\base64vlq\errors\InvalidBase64Input
     */
    public function testInvalidInput()
    {
        $base64 = new Base64();
        $base64->encode([1, 112, 3]);
    }

    /**
     * covers ::encode
     * covers ::decode
     * @expectedException \axy\codecs\base64vlq\errors\InvalidBase64
     */
    public function testInvalidBase64()
    {
        $base64 = new Base64();
        $base64->decode('A*3');
    }
}
