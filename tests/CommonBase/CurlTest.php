<?php

namespace HuoUtils\Test\CommonBase;



use App\Lib\Common\CommonBase\Curl;
use App\Lib\Common\CommonBase\FormatConversion;
use Tests\TestCase;

trait CurlTest
{


    /**
     *
     * @group Common
     * @throws \Exception
     */
    public function testPost()
    {
        $res = Curl::post("https://www.apiopen.top/weatherApi",['city' => "深圳"]);
        $res = FormatConversion::jsonDecode($res);

        $this->assertArrayHasKey('code', $res);
    }


    /**
     * @group Common
     * @throws \Exception
     */
    public function testGet()
    {
        $res = Curl::get("https://www.baidu.com");

        $this->assertContains("baidu.com",$res.'');
    }

}
