<?php

namespace HuoUtils\Tests\Utils;


use HuoUtils\Utils\PutQrcodeToImg;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;

class PutQrcodeToImgTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        $qrcode = "d5test";
        $output_path = __DIR__."/../output";
        if (!is_dir($output_path)) {
            mkdir($output_path);
        }
        $img_path =  $output_path."/test_qrcode".microtime(true).".jpg";

        $params = [
//            "logo_path" => "test.logo",
//            "label" => "hello",//
            "save_img_path" => $img_path,
            "size" => 200,
            "padding" => 20
//            "has_border" => true
        ];

        PutQrcodeToImg::putQrcode($qrcode,$params);
        $result = false;
        if(is_file($img_path)){
            $result = true;
        }

        $this->assertTrue($result);
    }
}
