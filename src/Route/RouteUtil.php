<?php

namespace HuoUtils\Route;

use HuoUtils\CommonBase\FileUtil;
use HuoUtils\CommonBase\ScatteredUtil;
use HuoUtils\Dictionary\BaseDict;
use Illuminate\Routing\Router;
use ReflectionClass;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/17
 * Time: 16:35
 */

class RouteUtil{


    /**
     * 生成自动映身路由的控制器
     * 规则: 在Admin,Http模块中的所有控制器，以Mp开头则表明自动映射
     * @param Router|null $router
     * @throws \ReflectionException
     */
    public static function mappedRouteFromController($module,Router $router = null)
    {


            $dir = app_path($module . "/Controllers/");
            $namespace_prefix = "App\\$module\Controllers\\";
            $file_names = FileUtil::allFile($dir);
            $file_names = self::getMpControllers($file_names,$namespace_prefix);
//            dump($file_names);
            foreach ($file_names as $file_name) {
                $true_file_name = rtrim($file_name,".php");
                $class_name = $namespace_prefix . $true_file_name;
                $reflection_class = new ReflectionClass($class_name);

                $route_prefix = self::getRoutePrefix( $file_name);
//                dump($class);
                $methods = ScatteredUtil::getPublicMethods($class_name) ? : [];
//                dump($methods);
                foreach ($methods as $method) {

                    $reflection_method = $reflection_class->getMethod($method);
                    $params = $reflection_method->getParameters();
                    $end = "";
                    //取到方法的参数
                    foreach ($params as $param) {
                        $param_name = $param->getName();
                        $end .= '/{' . $param_name . "}";
                    }

                    $action = class_basename($class_name ) . '@' . $method;
//                    dump($action);
                    $router &&  $router->any($route_prefix."/".camel_case($method).$end,$action);
                }
            }


    }


    protected static function getRoutePrefix($file_name)
    {

//        dump($file_name);
//        dump(rtrim($file_name,"ontroller.php"));
//        return strtolower(rtrim($file_name,"Controller.php"));
        return strtolower(str_replace("Controller.php", "", $file_name));
    }


    protected static function getMpControllers($file_arr,$namespace_prefix)
    {
        $col = collect($file_arr);
       return $col->filter(function($value,$key) use ($namespace_prefix){
    $class_name = $namespace_prefix . $value;

           if (ends_with($value, ".php")) {
               $class = new ReflectionClass(rtrim($class_name,".php"));

               return $class->hasProperty("map_route");
           }
             return false ;
        });
    }

}
