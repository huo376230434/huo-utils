<?php

namespace HuoUtils\Test\Database;






use HuoUtils\Database\MysqlMaintenance;
use PHPUnit\Framework\TestCase;

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
        /** @var TestCase $this */
        $this->assertTrue(is_file($result['full_name']));


    }
}
