<?php

header("content-type:text/html;charset=utf8");
//设置版本
if(version_compare(PHP_VERSION,"<","5.6.0")) die("php的版本必须是5.6以上");
//基本的路径
define("BASE_PATH",__DIR__."/");
//定义框架的路径
define("FRAMEWORK_PATH",BASE_PATH."framework/");
//定义项目的路径
define("APP_PATH",BASE_PATH."application/");
//引入框架的启动文件
require_once(FRAMEWORK_PATH."bootstrap.php");




