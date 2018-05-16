<?php

namespace Tests\Unit;

use HuoUtils\Utils\MysqlMaintenance;
use Orchestra\Testbench\TestCase;

class MysqlMaintenanceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

$config =  [
    'database' => "laravel_base",
    'username' => "root",
    'password' =>"aA123456!",

    //自定义：备份的路径
//    'database_backup_path' => env('DATABASE_BACKUP_PATH','/usr/local/mysql_backup/')
];
        $sql_obj = new MysqlMaintenance($config);

       $result = $sql_obj->backup();
//        $sql_obj->recover();

        $this->assertTrue(is_file($result['full_name']));

    }
}
