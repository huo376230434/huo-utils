<?php

namespace HuoUtils\Base;
use Ramsey\Uuid\Uuid;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/17
 * Time: 16:35
 */

class Util{


//    金额float转int
    public static function moneyFormat($amount,$times=100)
    {
        if(self::isWindows()){
            return (int)($amount*100);//在windows上无法用money_format函数
        }
        return (int)money_format("%i",(float)$amount*$times);

    }


    public static function isWindows()
    {
        return PHP_OS === "WINNT";

    }

    public static function uuid()
    {
        $data = Uuid::uuid1();
        $str = $data->getHex();    //32位字符串方法
        return $str;

    }

    /**
     *  作用：产生随机字符串，不长于32位
     */
    public static function createNoncestr($length)
    {

        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $str ="";
        for ( $i = 0; $i < $length; $i++ )  {
            $str.= substr($chars, mt_rand(0, strlen($chars)-1), 1);
        }
        return $str;

    }






    //为选择项增加第一个默认的选择
    public static function addTotalSelect($arr,$word = "全部",$key=0)
    {
        $arr = array_flip($arr);
        $arr = array_merge([$word => $key],$arr);
        $arr = array_flip($arr);
        return $arr;
    }




}