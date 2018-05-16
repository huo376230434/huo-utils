<?php

namespace HuoUtils\Base;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/17
 * Time: 16:35
 */

class FileUtil{


    public static function allFile($path,$has_all_attr=false)
    {

        $arr = self::getAllFileName($path);
        if($has_all_attr){
//            如果要拿到所有文件的属性
            foreach ($arr as $key => $value) {
                $temp_arr = [];

                $full_name = $path . "/" . $value;
                $temp_arr['id'] = $key+1;

                $temp_arr['name'] = $value;
                $temp_arr['filemtime'] =date("Y-m-d H:i:s", filemtime($full_name));
                $temp_arr['size'] =sprintf("%.2f",filesize($full_name) / (1024*1024)) ;
                $arr[$key] = $temp_arr;
            }
        }

        return $arr;
    }

    protected static function getAllFileName($path)
    {
        $handler = opendir($path);//当前目录中的文件夹下的文件夹
        $arr = [];
        while( ($filename = readdir($handler)) !== false ) {
            if($filename != "." && $filename != ".."){
                array_push($arr, $filename);
//                echo $filename."<br>";
            }
        }
        closedir($handler);
        return $arr;

    }




}