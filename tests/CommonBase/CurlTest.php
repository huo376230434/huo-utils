<?php

namespace HuoUtils\Test\CommonBase;







use HuoUtils\CommonBase\Curl;
use HuoUtils\CommonBase\FormatConversion;

/**
 *
 * Trait CurlTest
 * @package HuoUtils\Test\CommonBase
 */
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

        /** @var TestCase $this */
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
