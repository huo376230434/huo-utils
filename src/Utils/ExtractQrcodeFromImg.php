<?php
namespace HuoUtils\Utils;
use Exception;
use PHPZxing\PHPZxingDecoder;
use PHPZxing\ZxingImage;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/8
 * Time: 16:37
 *
 * 从图片中提取二维码的值的类库，依赖java环境
 */
class ExtractQrcodeFromImg {


    public static function extract($qrcode_img_path ){
        $config = array(
            'try_harder' => true, // 当不知道二维码的位置是设置为true
            'multiple_bar_codes' => true, // 当要识别多张二维码是设置为true
//            'crop' => '100,200,300,300', // 设置二维码的大概位置
        );
        $decoder        = new PHPZxingDecoder($config);

        $java_path = config("env.java_path") ? : "/usr/bin/java";

//        没有配置java_path,则抛异常
//        if(!$java_path){
//            throw new Exception("env.java_path config need to configured!");
//        }
        $decoder->setJavaPath( $java_path);  //设置jdk的安装路径，该扩展是居于java的，所以需要jdk。如果设置了jdk的环境变量则无需设置
//dd(config('admin.java_path'));
        $decodedData    = current($decoder->decode($qrcode_img_path)); // 路径需要时绝对路径或相对路径，不能是url
        /**
         *返回的对象类型
         * 识别成功时返回ZxingImage对象
         * 图片中没有识别的二维码时返回ZxingBarNotFound对象
        /**/
        if($decodedData instanceof ZxingImage){
            return  $decodedData->getImageValue();  // 二维码的内容
        }else{
            return $decodedData;
        }

    }

}