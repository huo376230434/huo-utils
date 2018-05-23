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

       $img = ImageManagerStatic::make($img_path);
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        return  $img->save($dest_path);
    }





}