<?php

namespace HuoUtils\Tests\Base;



use HuoUtils\Base\Curl;
use HuoUtils\Base\Util;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;

class CurlTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        //测试 get
//        $this->getTest();


        //测试 post

        $this->postTest();


    }

    protected function postTest()
    {
        echo Curl::post("https://www.apiopen.top/weatherApi",['city' => "深圳"]);


    }



    protected function getTest()
    {
       echo  Curl::get("https://www.baidu.com");
    }
}
