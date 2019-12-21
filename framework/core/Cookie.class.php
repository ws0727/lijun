<?php
namespace framework\core;
class Cookie{
    public static function has($name){
        if(isset($_COOKIE[$name])){
            return true;
        }else{
            return false;
        }
    }
    public static function add($name,$value,$time=0,$path='',$domain=''){
        //存入临时性的
        if($time===0){
            return setcookie($name,Crypt::encrypt($value),0,$path,$domain);
        }
        //存入持久性的
        return setcookie($name,Crypt::encrypt($value),time()+$time,$path,$domain);
    }
    public static function get($name){
        if(!isset($_COOKIE[$name])) return null;
        return Crypt::decrypt($_COOKIE[$name]);
    }
    public static function delete($name,$path="",$domain=""){
        return setcookie($name,null,time()-100,$path,$domain);
    }
}