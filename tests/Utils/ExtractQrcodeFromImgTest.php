<?php

namespace HuoUtils\Tests\Utils;

use HuoUtils\Utils\ExtractQrcodeFromImg;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;

class ExtractQrcodeFromImgTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $img_path = __DIR__."/../res/QrcodeTestImg.jpg";
        $result = ExtractQrcodeFromImg::extract($img_path);

        $this->assertEquals("HTTPS://QR.ALIPAY.COM/FKX09383TA78PHIPCW2S7E",$result);
    }
}
