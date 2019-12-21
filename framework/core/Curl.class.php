<?php
namespace framework\core;
class Curl{
    //get curl
    public static function getUrl($url){
        $ch=curl_init(); //初始化curl
        curl_setopt($ch,CURLOPT_URL,$url);//设置发送请求的url地址
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //如果设置成0直接输出相应文本如果设置成1将输出写入到变量中方便使用
        return curl_setopt($ch,CURLOPT_HEADER,0);
        $data=curl_exec($ch);
        curl_close($ch);
        return $data;
    }
    //pos turl
    public static function postUrl($url,$post_data=[]){
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //如果设置成0直接输出相应文本如果设置成1将输出写入到变量中方便使用
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($post_data));
        curl_setopt($ch, CURLOPT_POST, 1);
        $data=curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}
?>