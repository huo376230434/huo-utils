<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/16
 * Time: 18:08
 */

namespace HuoUtils\Base;

class Json {

    public static function encode($data)
    {
        return stripslashes(json_encode($data, JSON_UNESCAPED_UNICODE));

    }

    public static function ecode($data)
    {
        return json_decode($data, true);//返回数组

    }




}