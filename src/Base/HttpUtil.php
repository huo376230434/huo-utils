<?php
namespace HuoUtils\Base;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/17
 * Time: 16:35
 */

class HttpUtil{


//    连接参数字符串
    public static function concatParams($params,$out_array = []) {

        ksort($params);
        $pairs = array();
        foreach($params as $key=>$val) {
            if(in_array($key,$out_array)){
                continue;
            }
            array_push($pairs, $key . '=' . $val);
        }
        return join('&', $pairs);
    }

//参数数组拼接成

    public static function buildGetParamsUrl($url,$params)
    {
        $new_url = $url . "?";
        $new_url .= self::concatParams($params);
        return $new_url;

    }

}
