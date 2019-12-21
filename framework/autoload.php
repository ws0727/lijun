<?php
use framework\core\App;
class Autoload{
    public static function loadClass($class_name){
        $class_path=BASE_PATH.str_replace("\\","/",$class_name).".class.php";
        if(file_exists($class_path)){
            require_once $class_path;
            App::get("debug")->file[]=$class_path;
        }else{
            throw new \framework\core\ErrorException($class_path."文件不存在");
        }
    }
}
//将autoload中的方法注册成一个自动加载的方法
spl_autoload_register(['Autoload','loadClass']);