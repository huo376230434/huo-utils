<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/16
 * Time: 18:08
 */

namespace HuoUtils\Base;


use GuzzleHttp\Client;

class Curl {

    public static function post($url,$data,$content_type="form_params",$time_out=5)
    {

        //        发送请求
        $client = new Client([
            'timeout' =>$time_out
        ]);

        $options = array($content_type => $data);

        $curl_response = $client->post($url, $options);
        if($curl_response->getStatusCode() !== 200){
            return false;
        }

        return $curl_response->getBody();

    }









}