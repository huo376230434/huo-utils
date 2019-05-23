<?php

namespace HuoUtils\Test\CommonBase;

use App\Lib\Common\CommonBase\FormatConversion;
use Tests\TestCase;

trait FormatConversionTest
{
    /**
     * 测试json转义.
     *
     * @return void
     */
    public function testJsonEncodeDecode()
    {
        $json_test = $this->arrData();
        $json_string = FormatConversion::jsonEncode($json_test);

//        $json_string = json_encode($json_test);

        //测试json有没有增加反斜杠,默认是有这种: ht
        //tp:\/\/127.0.0.1:8000\/testdox.htm
        //l?3=4&5=1&54
        $this->assertContains('http://127.0.0.1:8000/testdox.html?3=4&5=1&54',$json_string);

        //测试json有没有将中文转义unicode 默认转成 \u4e2d\u6587
        $this->assertContains('中文',$json_string);

        //测试再转回来
        $back = FormatConversion::jsonDecode($json_string);
        $this->assertArrayHasKey("english",$back);

    }


    public function testXmlConvension()
    {
        $origin_arr = $this->arrData();

        //        把数组转成xml, 再转回arr,看下与原始的是否相等.如果出错会有异常抛出
        $xmlstr = FormatConversion::arrayToXml($origin_arr);

        $end_arr = FormatConversion::xmlToArray($xmlstr);

        $this->assertSame($end_arr, $origin_arr);

    }


    /**
     * 给上面的方法提供数据
     * @return array
     */
    protected function arrData()
    {
        return [
            'rr' => "@!fdf",
            'english' =>
                [
                  'url' =>   'http://127.0.0.1:8000/testdox.html?3=4&5=1&54',

                    'ttt' => [
                        'dd' => '中文',
                        'qq' => '9'
                    ]
                ]
        ];

    }


}
