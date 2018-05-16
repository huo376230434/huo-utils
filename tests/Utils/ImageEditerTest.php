<?php

namespace HuoUtils\Tests\Utils;

use HuoUtils\Utils\ImageEditer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;

class ImageEditerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $img_path = __DIR__."/../res/QrcodeTestImg.jpg";
        $out_path = __DIR__."/../output/test_qrcode".microtime(true).".jpg";

        $width = 40;
        $height = 40;
        ImageEditer::reSize($img_path, $width, $height,$out_path);

        $result = false;
        if(is_file($out_path)){
            $result = true;
        }

        $this->assertTrue($result);
    }
}
