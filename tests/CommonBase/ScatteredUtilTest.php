<?php

namespace HuoUtils\Test\CommonBase;

use App\Lib\Common\CommonBase\ScatteredUtil;
use Tests\TestCase;

trait ScatteredUtilTest
{
    /**
     * 测试 金额float转int
     *
     * @return void
     */
    public function testMoneyFormat()
    {

//        测试money_format
        $test_value = 0.65;
        $this->assertEquals(65,ScatteredUtil::moneyFormat($test_value));


//        测试 createNoncestr
        $length = 32;
        $str = ScatteredUtil::createNoncestr($length);
        $this->assertEquals($length, strlen($str));


    }


}
