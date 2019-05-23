<?php

namespace HuoUtils\Test\CommonBase;




use HuoUtils\CommonBase\ScatteredUtil;
use PHPUnit\Framework\TestCase;

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
        /** @var TestCase $this */
        $this->assertEquals(65,ScatteredUtil::moneyFormat($test_value));


//        测试 createNoncestr
        $length = 32;
        $str = ScatteredUtil::createNoncestr($length);
        /** @var TestCase $this */
        $this->assertEquals($length, strlen($str));


    }


}
