<?php

namespace HuoUtils\Test\ThirdUtils;






trait ImageEditerTest
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $img_path = base_path('/tests/storage/res/二维码解码测试图片.png');
        $out_path = base_path('/tests/storage/output/'.microtime(true).".jpg");

        $width = 100;
//        $height = 28;
//        ImageEditer::reSize($img_path, $width, $height,$out_path);
        ImageEditer::reSize($img_path, $width, $out_path);
//        ImageEditer::reSize($img_path, $width, $out_path,$height);


        $this->assertFileExists($out_path);
    }
}
