<?php

namespace HuoUtils\Test\CommonBase;



use App\Lib\Common\CommonBase\FileUtil;
use App\Lib\Common\CommonBase\Util;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

trait FileUtilTest
{
    /**
     *测试文件列表
     * @group Common
     * @return void
     */
    public function testAllFileList()
    {

        $dir_path = base_path('/tests/storage/');
        $res = (FileUtil::allFileWithAttrs($dir_path,true));
        $this->assertArrayHasKey(0, $res);
    }

    /**
     * 测试文件夹删除
     * @group Common
     */
    public function testRmDir()
    {
        $dir_path = base_path('/tests/storage/output/test_del');
        $this->generateTestRmDir($dir_path);

            FileUtil::rmDir($dir_path,false);
        $this->assertDirectoryNotExists($dir_path);

    }


    /**
     *测试递归生成文件夹
     */
    public function testRecursionMkDir()
    {
        $dir_path = base_path('/tests/storage/output/test_recursion');
        $dir_extra_path = $dir_path . '/dir1/dir2/dir3/test';
        FileUtil::recursionMkDir($dir_extra_path);
        $this->assertDirectoryExists($dir_extra_path);
        FileUtil::rmDir($dir_path,false);

    }


    /**
     * 生成测试要删除的目录
     * @param $dir_path
     */
    protected function generateTestRmDir($dir_path)
    {
        if (!is_dir($dir_path)) {
            mkdir($dir_path);
        }
        //生成5个随机文件
        for ($i = 0; $i < 5; $i++) {
            $tem_dir_path = $dir_path . '/' . $i.time();
            mkdir($tem_dir_path);
            for ($j = 0; $j < 20; $j++) {
                file_put_contents($tem_dir_path . "/" . $j,$j);
            }
        }

    }
}
