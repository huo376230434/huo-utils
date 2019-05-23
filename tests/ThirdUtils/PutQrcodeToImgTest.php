<?php

namespace HuoUtils\Test\ThirdUtils;





trait PutQrcodeToImgTest
{


    protected $qrcode = 'd5test';
    protected $output_path;
    protected $img_path;
    /**
     * A basic test example.
     * @group makeQrcode
     * @return void
     */
    public function testToFile()
    {

        $this->initParams();
        $params = [
//            "logo_path" => "test.logo",
            "label" => "hello",//
            "save_img_path" => $this->img_path,
            "size" => 200,
            "padding" => 20
//            "has_border" => true
        ];

        PutQrcodeToImg::putQrcode($this->qrcode,$params);

        self::assertFileExists($this->img_path);
    }

    protected function initParams(){
        $this->qrcode = "d5test";
        $this->output_path = base_path('/tests/storage/output');

        if (!is_dir($this->output_path)) {
            mkdir($this->output_path);
        }
      $this->img_path =  $this->output_path."/test_qrcode".microtime(true).".jpg";
    }


    /**
     *
     *  @group makeQrcode
     */
    public function testToStream()
    {
        $this->initParams();
        $params = [
//            "logo_path" => "test.logo",
            "size" => 200,
            "padding" => 20
//            "has_border" => true
        ];

        $res = PutQrcodeToImg::putQrcode($this->qrcode,$params);

        self::assertContains("data:image/png",$res);

    }

}
