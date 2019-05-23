<?php

namespace HuoUtils\Test\ThirdUtils;






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
