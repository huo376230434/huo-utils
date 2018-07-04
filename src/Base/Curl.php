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
            throw new \Exception($url."post请求出错" );
        }

        return $curl_response->getBody();

    }


    public static function get($url,$time_out = 5)
    {
        $client = new Client([
            'timeout' =>$time_out
        ]);
        $curl_response = $client->get( $url);

        if($curl_response->getStatusCode() !== 200){
            throw new \Exception($url."get请求出错" );
        }
        return $curl_response->getBody();
    }









}