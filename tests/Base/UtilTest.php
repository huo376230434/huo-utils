<?php

namespace HuoUtils\Tests\Base;



use HuoUtils\Base\Util;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;

class UtilTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
//        测试money_format
        $test_value = 0.65;
        $this->assertTrue(Util::moneyFormat($test_value) === 65);

//       测试uuid
        $str = Util::uuid();
        dump($str);
        $this->assertTrue(strlen($str) === 32);

//        测试 createNoncestr
        $length = 32;
        echo Util::createNoncestr($length);



    }
}
