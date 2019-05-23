<?php

namespace HuoUtils\Test\ThirdUtils;
use App\Lib\Common\Route\RouteUtil;
use Illuminate\Routing\Router;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

trait RouteUtilTest
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {

        //测试通过类调取公共的方法 的通用公共类
//        $class = UtilController::class;
//        dump(CommonUtil::getPublicMethods($class));

//        测试路由工具类
//        $router = new Router();

         RouteUtil::mappedRouteFromController();


        $this->assertTrue(true);
    }
}
