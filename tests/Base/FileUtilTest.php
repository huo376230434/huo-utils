<?php

namespace HuoUtils\Tests\Base;



use HuoUtils\Base\FileUtil;
use HuoUtils\Base\Util;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase;

class FileUtilTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        //测试文件夹删除
        $dir_path = __DIR__."/../output/Base";

        dd(FileUtil::allFile($dir_path,false,true));
//        FileUtil::rmDir($dir_path);




    }
}
