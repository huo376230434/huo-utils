<?php

namespace HuoUtils\Tests\Base;



use HuoUtils\Base\CsvExport;
use Orchestra\Testbench\TestCase;

class CsvExportTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {


        $data = [
            ["ID" => 0 ,"名称" => "真的吗"],
            ["ID" => 1 ,"名称" => "不是"],
            ["ID" => 3 , "名称" => "呵呵"]
        ];
        $file_name = "测试csv".time().".csv";
        $file_path = __DIR__ . "/../output/";

$path = CsvExport::export($file_name,$data,$file_path);

        $result = false;
        if(is_file($path)){
            $result = true;
        }

        $this->assertTrue($result);
    }
}
