<?php

namespace HuoUtils\Test\CommonBase;



trait CsvExportTest
{
    /**
     * A basic test example.
     * @group Common
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
        $file_path = base_path('/tests/storage/output/');
$path = CsvExport::export($file_name,$data,$file_path);
        $this->customAssertTrue($path);

    }

    /**
     * 断言结果是否正确
     * @param $path
     */
    protected function customAssertTrue($path)
    {
        $result = false;
        if(is_file($path)){
            $res = file_get_contents($path);
            $res = explode("\n",trim($res,"\n"));
            if (is_array($res) && count($res) == 4) {
                $result = true;
            }
        }
        $this->assertTrue($result);

    }
}
