<?php
namespace HuoUtils\Utils;
use Intervention\Image\ImageManagerStatic ;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/9
 * Time: 18:33
 */
class ImageEditer {


    public static function reSize($img_path, $width, $height,$dest_path=null)
    {
        return  ImageManagerStatic::make($img_path)->resize($width  , $height)->save($dest_path);
    }





}