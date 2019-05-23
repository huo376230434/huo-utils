<?php

namespace HuoUtils\Test\ThirdUtils;

use App\Lib\Common\ThirdUtils\ExtractQrcode;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Zxing\QrReader;

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
