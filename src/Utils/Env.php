<?php
namespace HuoUtils\Utils;

use Dotenv\Dotenv;

/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/3/10
 * Time: 20:03
 */
class Env{



    public static function resolve($dir,$file_name=".env")
    {
        $arr =  (new Dotenv($dir,$file_name))->load();

        $new_arr = [];
        foreach ($arr as $value) {
            $value = trim($value);
            if(starts_with($value,"#")){
                continue;
            }
            list($k, $fields) = explode("=",$value);
            $new_arr[$k] =$fields;

        }

        return $new_arr;

    }


}
