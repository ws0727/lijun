<?php
namespace framework\core;
class Session{
    //开启session
    public static function start(){
        session_start();
    }
    //判断是否存在
    public static function has($name){
       if(isset($_SESSION[$name])){
           return true;
       }else{
           return false;
       }
    }
    //session添加
    public static function add($name,$value){
        $_SESSION[$name]=$value;
    }
    //获取session
    public static function get($name){
        if(!isset($_SESSION[$name])){
            return null;
        }else{
            return $_SESSION[$name];
        }
    }
    //删除session
    public static function delete($name=null){
        if($name===null){
            session_destroy();
        }
        if(!isset($_SESSION[$name])){
            return null;
        }else{
            $_SESSION[$name]=null;
            return true;
        }
    }
}