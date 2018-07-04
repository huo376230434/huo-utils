<?php

namespace HuoUtils\Base;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/17
 * Time: 16:35
 */

class FileUtil{


    public static function allFile($path,$has_all_attr=false,$stretch = false)
    {

        $arr = self::getAllFileName($path,$stretch);
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

    protected static function getAllFileName($path,$stretch = false,$base_name = "")
    {
        $handler = opendir($path);//当前目录中的文件夹下的文件夹
        $arr = [];
        while( ($filename = readdir($handler)) !== false ) {
            if($filename != "." && $filename != ".."){

                $temp_path = $path . "/" . $filename;
                if ($stretch && is_dir($temp_path) ) {
//如果要全部文件
                    $base_filename = $base_name.$filename . "/";
                    $arr = array_merge($arr, self::getAllFileName($temp_path,true ,$base_filename));

                }else{
                    array_push($arr, $base_name.$filename);

                }

//                echo $filename."<br>";
            }
        }
        closedir($handler);
        return $arr;

    }




//    下载文件

    public static function download($content,$file_name)
    {
        header("Content-type:application/octet-stream");
        header("Accept-Ranges:bytes");
        header("Content-Disposition: attachment; filename=".$file_name);
        echo $content;
        exit();

    }


    public static function rmDir($dir_name,$echo=true)
    {
        if ( $handle = opendir( "$dir_name" ) ) {
            while ( false !== ( $item = readdir( $handle ) ) ) {
                if ( $item != "." && $item != ".." ) {
                    if ( is_dir( "$dir_name/$item" ) ) {
                        self::rmDir("$dir_name/$item" );
                    } else {
                        if( unlink( "$dir_name/$item" )  && $echo ) {
                           echo "成功删除文件： $dir_name/$item\n";
                        }
                    }
                }
            }
            closedir( $handle );
            if( rmdir( $dir_name )   && $echo )echo "成功删除目录： $dir_name\n";
        }

    }




}