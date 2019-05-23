<?php

namespace HuoUtils\Test\ThirdUtils;








trait QrcodedDecodeTest
{
    /**
     * A basic test example.
     * @return void
     */
    public function testNormal()
    {

        $path = base_path('/tests/storage/res/二维码解码测试图片.png');
        $text = ExtractQrcode::getQrcode($path); //return decoded text from QR Code
        self::assertSame('wxp://f2f1YPAiYae4IULseFTrcUbnYx8tt_EcVWkc',$text);

    }


    /**
     *
     */
    public function testQrcodeDecodeError()
    {
        $path = base_path('/tests/storage/res/二维码解码解不出来的图片.png');
        $text = ExtractQrcode::getQrcode($path); //return decoded text from QR Code
        self::assertFalse($text);
    }
}
