<?php

namespace HuoUtils\Test\Database;

use App\Lib\Common\ThirdUtils\MysqlMaintenance;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

trait MysqlMaintenanceTest
{


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBackup()
    {
        $sql_obj = new MysqlMaintenance();

//测试备份
        $result = $sql_obj->backup();
        $this->assertTrue(is_file($result['full_name']));


    }
}
